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
    public function store(Request $request)
    {
        try {
            $params = $request->all();
            $params['supplier_id'] = $params['supplier_id'][0];
            $params['category_id'] = $params['category_id'][0];
            $params['unit_id'] = $params['unit_id'][0];
            $params['avatar'] = $params['fileAvatar'][0];
            $params['status'] = $params['status'][0];
            $params['import_price'] = str_replace(",", "", $params['import_price']);
            $params['selling_price'] = str_replace(",", "", $params['selling_price']);
            $params['quantity'] = str_replace(",", "", $params['quantity']);

            // remove params file upload
            $params = array_diff_key($params, array_flip(["fileAvatar", "fileUpload"]));

            // insert data product
            $product = $this->productService->createData($params);

            if ($product instanceof Product) {
                // insert images of product
                foreach ($request->fileUpload as $value) {
                    $this->imageService->createData([
                        'product_id' => $product->id,
                        'url' => $value
                    ]);
                }
            }

            return redirect()->route('admin.products.index')->with('message', trans('product.createSuccessfull'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
        }
    }
}
