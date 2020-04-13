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
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Services\Property\IPropertyService;

class ProductController extends Controller
{
    protected $productService;
    protected $imageService;
    protected $propertyService;

    public function __construct(IProductService $IProductService, IImageService $IImageService, IPropertyService $IPropertyService)
    {
        $this->productService = $IProductService;
        $this->imageService = $IImageService;
        $this->propertyService = $IPropertyService;
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
        $property = Property::all();

        return view('admin.products.create', [
            'categories' => $categories,
            'supplier' => $supplier,
            'unit' => $unit,
            'property' => $property
        ]);
    }

    /**
     * Show the application product.
     * @param string $id
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            // Open transaction
            DB::beginTransaction();
            //

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
                if($request->properties) {
                    foreach ($params['properties'] as $keyPro => $property) {
                        foreach ($property as $keyList => $value) {
                            $product->productProperties()->attach([
                                $keyPro => ['value' => $value],
                            ]);
                        }
                    }
                }
            }

            // Commit transaction
            DB::commit();
            //
            return redirect()->route('admin.products.index')->with('message', trans('product.createSuccessfull'));
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();
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
            $property = Property::all();
            $productProperty = $product->productProperties()->get()->toArray();
            $images = [];
            if($product->images) {
                foreach($product->images as $item){
                    if(Storage::disk('dropbox')->exists($item->url)) {
                        $images[] = (object)[
                            'name' => $item->url,
                            'path' => Storage::disk('dropbox')->url($item->url),
                            'size' => Storage::disk('dropbox')->size($item->url)
                        ];
                    }
                }
            }
            // $avatar = $product->avatar ? $this->productService->base64_to_jpeg(base64_encode(Storage::disk('dropbox')->get($product->avatar))) : null;
            $avatar = $product->avatar && Storage::disk('dropbox')->exists($product->avatar) ? (object)[
                'name' => $product->avatar,
                'path' => Storage::disk('dropbox')->url($product->avatar),
                'size' => Storage::disk('dropbox')->size($product->avatar)
            ] : null;

            return view('admin.products.edit', [
                'product' => $product,
                'avatar' => $avatar,
                'categories' => $categories,
                'supplier' => $supplier,
                'unit' => $unit,
                'images' => $images,
                'property' => $property,
                'productProperty' => $productProperty
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ProductRequest $request)
    {
        $product = $this->productService->findByUuid($id);
        if ($product instanceof Product) {
            try {
                $params = $request->all();
                $params['import_price'] = str_replace(",", "", $params['import_price']);
                $params['selling_price'] = str_replace(",", "", $params['selling_price']);
                $params['quantity'] = str_replace(",", "", $params['quantity']);
                
                if($request->fileUpload) {
                    // remove params file upload
                    $params = array_diff_key($params, array_flip(["fileUpload"]));
                }

                // get current avatar of product
                $avatarRemove = $product->avatar;

                // Open transaction
                DB::beginTransaction();
                //

                $product = $this->productService->updateData($params, $product->id);

                $images = [];
                foreach ($product->images as $image) {
                    array_push($images, $image->url);
                }

                // insert images of product
                if($request->fileUpload) {
                    foreach ($request->fileUpload as $file) {
                        if(in_array($file,$images)) {
                            $image->touch(); // update updated_at
                        }
                        else {
                            $this->imageService->createData([
                                'product_id' => $product->id,
                                'url' => $file
                            ]);
                        }
                    }
                }

                // remove file in dropbox
                if($request->avatarRemove && $avatarRemove && Storage::disk('dropbox')->exists($product->avatar)) {
                    Storage::disk('dropbox')->delete($avatarRemove);
                }
                
                // remove file images
                if($request->fileRemove && $product->images) {
                    foreach ($request->fileRemove as $image) {
                        if(in_array($image,$images)) {
                            // remove file in database
                            foreach ($product->images as $value) {
                                if($image == $value->url)
                                    $value->delete();
                            }

                            // remove file in dropbox
                            if(Storage::disk('dropbox')->exists($image)) {
                                Storage::disk('dropbox')->delete($image);
                            }
                        }
                    }
                }

                if($request->properties) {
                    $product->productProperties()->detach();
                    foreach ($params['properties'] as $keyPro => $property) {
                        $arrValue = [];
                        foreach ($property as $keyList => $value) {
                            $product->productProperties()->attach([
                                $keyPro => ['value' => $value],
                            ]);
                        }
                        
                    }
                }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteMultiple(Request $request)
    {
        if($request->arraySelected) {
            $params = array_map('intval', explode(',', $request->arraySelected));

            foreach ($params as $key => $value) {
                $product = $this->productService->findByUuid($value);
                if ($product instanceof Product) {
                   $product->delete();
                } else {
                    return $this->responseJSON(false, trans('product.notFound'));
                }
            }
        }
        return redirect()->route('admin.products.index')->with('message', trans('product.removedSuccessfull'));
    }
}
