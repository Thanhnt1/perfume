<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\IProductService;
use App\Services\Image\IImageService;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productService;
    protected $imageService;

    public function __construct(IProductService $IProductService, IImageService $IImageService)
    {
        $this->productService = $IProductService;
        $this->imageService = $IImageService;
    }
    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->productService->fetchAllJSON($request);
        }

        return view('admin.products.index');
    }

    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $supplier = Supplier::all();
        $unit = Unit::all();

        return view('admin.products.create', [
            'categories' => $categories,
            'supplier' => $supplier,
            'unit' => $unit
        ]);
    }

    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $params = $request->all();
            $params['import_price'] = str_replace(",", "", $params['import_price']);
            $params['selling_price'] = str_replace(",", "", $params['selling_price']);
            $params['quantity'] = str_replace(",", "", $params['quantity']);

            if($request->fileUpload) {
                // remove params file upload
                $params = array_diff_key($params, array_flip(["fileUpload"]));
            }

            // insert data product
            $product = $this->productService->createData($params);

            if ($product instanceof Product) {
                if($request->fileUpload) {
                    // insert images of product
                    foreach ($request->fileUpload as $value) {
                        $this->imageService->createData([
                            'product_id' => $product->id,
                            'url' => $value
                        ]);
                    }
                }
                if($request->fileRemove) {
                    foreach ($request->fileRemove as $value) {
                        Storage::disk('dropbox')->delete($value);
                    }
                }
            }

            return redirect()->route('admin.products.index')->with('message', trans('product.createSuccessfull'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
        }
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $product = $this->productService->findByUuid($id);
        if ($product instanceof Product) {
            $categories = Category::all();
            $supplier = Supplier::all();
            $unit = Unit::all();
            $images = [];
            if($product->images) {
                foreach($product->images as $item){
                    $images[] = (object)[
                        'name' => $item->url,
                        'path' => Storage::url('products/'.$item->url),
                        'size' => 1000
                    ];
                }
            }
            $avatar = $product->avatar ? 'data:image/jpeg;base64, '.base64_encode(Storage::disk('dropbox')->get($product->avatar)) : null;
            // dd($product);
            return view('admin.products.edit', [
                    'product' => $product,
                    'avatar' => $avatar,
                    'categories' => $categories,
                    'supplier' => $supplier,
                    'unit' => $unit,
                    'images' => $images
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param CampaignRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, CampaignRequest $request)
    {
        $product = $this->productService->findByUuid($id);
        if ($product instanceof Product) {
            try {
                // Open transaction
                DB::beginTransaction();
                //

                // $product = $this->productService->updateData($request->all(), $product->id);
                
                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.products.index')->with('message', trans('product.updateSuccessfull'));
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();
                return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
            }
        } else {
            abort(404);
        }
    }
}
