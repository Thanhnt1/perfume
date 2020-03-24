<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Category\ICategoryService;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(ICategoryService $ICategoryService)
    {
        $this->categoryService = $ICategoryService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->categoryService->fetchAllJSON($request);
        }

        return view('admin.categories.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $params = $request->all();
            // $find = $this->categoryService->find('name')
            // if()
            // insert data product
            $category = $this->categoryService->createData($params);

            return redirect()->route('admin.categories.index')->with('message', trans('product.createSuccessfull'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
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
                $category = $this->categoryService->findByID($value);
                if ($category instanceof Category) {
                   $category->delete();
                } else {
                    return $this->responseJSON(false, trans('product.notFound'));
                }
            }
        }
        return redirect()->route('admin.products.index')->with('message', trans('product.removedSuccessfull'));
    }
}
