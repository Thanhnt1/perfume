<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ShippingDepartment\IShippingDepartmentService;
use App\Services\TypeShipping\ITypeShippingService;
use App\Http\Requests\ShippingDepartmentRequest;
use App\Models\ShippingDepartment;
use Illuminate\Support\Facades\DB;

class ShippingDepartmentController extends Controller
{
    protected $shippingDepartmentService, $typeShippingService;

    public function __construct(IShippingDepartmentService $IShippingDepartmentService, ITypeShippingService $typeShippingService )
    {
        $this->shippingDepartmentService = $IShippingDepartmentService;
        $this->typeShippingService = $typeShippingService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->shippingDepartmentService->fetchAllJSON($request);
        }

        return view('admin.shipping-department.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param ShippingDepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingDepartmentRequest $request)
    {
        try {
            $params = $request->all();

            // insert data ShippingDepartmentService
            $shippingDepartment = $this->shippingDepartmentService->createData($params);

            return redirect()->route('admin.shipping-department.index')->with('message', trans('shipping-department.createSuccessfull'));
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
                $shippingDepartment = $this->shippingDepartmentService->findByID($value);
                if ($shippingDepartment instanceof ShippingDepartment) {
                   $shippingDepartment->delete();
                } else {
                    return $this->responseJSON(false, trans('shipping-department.notFound'));
                }
            }
        }
        return redirect()->route('admin.shipping-department.index')->with('message', trans('shipping-department.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $shippingDepartment = $this->shippingDepartmentService->findByID($request->id);
        if ($shippingDepartment instanceof ShippingDepartment) {
            try {
                $params = $request->all();

                // Open transaction
                DB::beginTransaction();
                //

                $shippingDepartment = $this->shippingDepartmentService->updateData($params, $shippingDepartment->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.shipping-department.index')->with('message', trans('shipping-department.updateSuccessfull'));
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
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function typeShipping(Request $request)
    {
        if ($request->ajax()) {
            return $this->shippingDepartmentService->fetchAllTypeJSON($request);
        }
    }

    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTypeShipping(Request $request)
    {
        if ($request->ajax()) {
            $params = $request->all();
            $params['price'] = str_replace(",", "", $params['price']);

            // insert data ShippingDepartmentService
            $typeShipping = $this->typeShippingService->createData($params);

            return $this->responseJSON(true, trans('Success'), 200, $typeShipping);
        }
    }
}
