<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    // protected $imageService;

    // public function __construct(IProductService $IProductService)
    // {
    //     $this->productService = $IProductService;
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();

        $categories = Category::with(['products' => function($query) {
            // Query the name field in status table
            $query->where('products.status', 1);
        }])->get();

        $suppliers = Supplier::with(['products' => function($query) {
            // Query the name field in status table
            $query->where('products.status', 1);
        }])->get();
        
        $productList = Product::paginate(12)->toArray();
        // dd($productList);
        return view('client.product', [
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'productList' => $productList,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // dd($request->all());

        $products = Product::where('status', 1);

        $categories = Category::with(['products' => function($query) {
            // Query the name field in status table
            $query->where('products.status', 1);
        }])->get();

        $suppliers = Supplier::with(['products' => function($query) {
            // Query the name field in status table
            $query->where('products.status', 1);
        }])->get();
        
        $productList = new Product;
        if($request->category) {
            $productList = $products->where('category_id', $request->category);
        }
        if($request->brand) {
            $productList = $products->whereIn('supplier_id', $request->brand);
        }

        // dd($productList->paginate(12)->toArray());
        return view('client.product', [
            'products' => $products->get(),
            'categories' => $categories,
            'suppliers' => $suppliers,
            'productList' => $productList->paginate(12)->toArray(),
            'request' => $request
        ]);
    }
}
