<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Supplier\ISupplierService;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(ISupplierService $ISupplierService)
    {
        $this->supplierService = $ISupplierService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->supplierService->fetchAllJSON($request);
        }

        return view('admin.suppliers.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param SupplierRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        try {
            $params = $request->all();

            // insert data supplier
            $supplier = $this->supplierService->createData($params);

            return redirect()->route('admin.suppliers.index')->with('message', trans('supplier.createSuccessfull'));
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
                $supplier = $this->supplierService->findByID($value);
                if ($supplier instanceof Supplier) {
                   $supplier->delete();
                } else {
                    return $this->responseJSON(false, trans('supplier.notFound'));
                }
            }
        }
        return redirect()->route('admin.suppliers.index')->with('message', trans('supplier.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $supplier = $this->supplierService->findByID($request->id);
        if ($supplier instanceof Supplier) {
            try {
                $params = $request->all();

                // Open transaction
                DB::beginTransaction();
                //

                $supplier = $this->supplierService->updateData($params, $supplier->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.suppliers.index')->with('message', trans('supplier.updateSuccessfull'));
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
