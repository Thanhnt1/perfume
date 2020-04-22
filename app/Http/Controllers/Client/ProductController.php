<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Comment;
use App\Services\Product\IProductService;
use App\Services\Comment\ICommentService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productService, $commentService;

    public function __construct(IProductService $IProductService, ICommentService $ICommentService)
    {
        $this->productService = $IProductService;
        $this->commentService = $ICommentService;
    }

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
        // dd($products);
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

        // search
        if($request->search) {
            $productList = $products->select('products.*', 'suppliers.name as supplier_name')
            ->where('products.name','like',"%{$request->search}%")
            ->orWhere('suppliers.name','like',"%{$request->search}%")
            ->leftJoin('suppliers', 'products.supplier_id', 'suppliers.id');
        }

        // category
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
        // dd($productList->paginate(12)->toArray());
        return view('client.product', [
            'products' => $dataProducts,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'productList' => $productList->paginate(12)->toArray(),
        ]);
    }

    public function detail(Request $request, $id, $name)
    {
        // dd($request->all());
        $product = $this->productService->findByUuid($id);

        if ($product instanceof Product) {
            $suppliers = Supplier::with(['products' => function($query) {
                // Query the name field in status table
                $query->where('products.status', 1);
            }])->where('id', $product->supplier->id)->first();

            $color = $product->productProperties()->where('name', 'Color')->get();
            $volume = $product->productProperties()->where('name', 'Volume')->get();
            
            $otherProducts = Product::where('id', '!=', $product->id)
            ->where(function($query) use($product) {
                $query->where('supplier_id', $product->supplier->id)
                ->orWhere('name','like',"%{$product->name}%");
            })->get()->take(10);

            $comments = $product->comments()->with(['customer'])->paginate(5);
            // dd($comments->items());
            return view('client.product-detail', [
                'product' => $product,
                'suppliers' => $suppliers,
                'color' => $color,
                'volume' => $volume,
                'otherProducts' => $otherProducts,
                'comments' => $comments
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Store the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateComment(Request $request)
    {
        $comment = $this->commentService->findById($request->id);
        $params = $request->all();
        if ($comment instanceof Comment) {
            try {
                // Open transaction
                DB::beginTransaction();
                // dd($request->increase);
                if($request->increase == 1) {
                    $params['like'] = $comment->like ? $comment->like + 1 : 1;
                }
                if($request->increase == 0) {
                    $params['like'] = $comment->like ? $comment->like - 1 : null;
                }

                // Update user
                $comment = $this->commentService->updateData($params, $comment->id);

                // Commit transaction
                DB::commit();
                //
                return $this->responseJSON(true, trans('product.commentUpdateSuccessfull'), 200);
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();
                return $this->responseJSON(false, trans($e->getMessage()));
            }
        } else {
            return $this->responseJSON(false, trans('product.notFound'));
        }
    }
}
