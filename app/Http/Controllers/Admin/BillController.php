<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Bill\IBillService;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    protected $billService;

    public function __construct(IBillService $IBillService)
    {
        $this->billService = $IBillService;
    }

    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->billService->fetchAllJSON($request);
        }

        return view('admin.bills.index');
    }

    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderProcessing(Request $request)
    {
        if ($request->ajax()) {
            return $this->billService->fetchAllJSON($request);
        }

        return view('admin.order-processing.index');
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $bill = $this->billService->findByID($request->id);
        if ($bill instanceof Bill) {
            try {
                $params = $request->all();

                // Open transaction
                DB::beginTransaction();
                //

                $bill = $this->billService->updateData($params, $bill->id);

                // Commit transaction
                DB::commit();
                //
                return $this->responseJSON(true, trans('success'), 200);
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();
                return $this->responseJSON(false, trans('fail'));
            }
        } else {
            return $this->responseJSON(false, trans('Not Found Bill'));
        }
    }
}
