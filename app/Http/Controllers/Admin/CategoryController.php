<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Category\ICategoryService;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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

            // insert data category
            $category = $this->categoryService->createData($params);

            return redirect()->route('admin.categories.index')->with('message', trans('category.createSuccessfull'));
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
        return redirect()->route('admin.products.index')->with('message', trans('category.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $category = $this->categoryService->findByID($request->idCategory);
        if ($category instanceof Category) {
            try {
                $params = $request->all();
                $params['name'] = $params['nameCategory'];
                $params['description'] = $params['descriptionCategory'];

                // Open transaction
                DB::beginTransaction();
                //

                $category = $this->categoryService->updateData($params, $category->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.categories.index')->with('message', trans('category.updateSuccessfull'));
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
