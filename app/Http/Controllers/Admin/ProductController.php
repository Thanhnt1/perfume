<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\IProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(IProductService $IProductService)
    {
        $this->productService = $IProductService;
    }
    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($this->productService->fetchAllJSON($request));
        if ($request->ajax()) {
            // dd(1);
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
        return view('admin.products.create');
    }

    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view('admin.products.create');
    }
}
