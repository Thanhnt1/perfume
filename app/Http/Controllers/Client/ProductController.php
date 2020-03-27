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
    public function index(Request $request)
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
            'params' => $request
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
        $dataProducts = $products->get();

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

        // sort by
        if($request->sort_by == "bestseller") {
            $productList = $products->orderBy('quantity_sold', 'desc');
        }
        if($request->sort_by == "pricehighest") {
            $productList = $products->orderBy('selling_price', 'asc');
        }
        if($request->sort_by == "pricelowest") {
            $productList = $products->orderBy('selling_price', 'desc');
        }
        if($request->sort_by == "rate") {
            $productList = $products->orderBy('rate', 'desc');
        }

        return view('client.product', [
            'products' => $dataProducts,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'productList' => $productList->paginate(12)->toArray(),
            'params' => $request
        ]);
    }
}
