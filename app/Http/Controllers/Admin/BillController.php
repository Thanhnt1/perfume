<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Bill\IBillService;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use App\Services\Product\IProductService;

class BillController extends Controller
{
    protected $billService;
    protected $productService;

    public function __construct(IBillService $IBillService, IProductService $IProductService)
    {
        $this->billService = $IBillService;
        $this->productService = $IProductService;
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

                // reduct quantity product
                if($bill->status == 3) {
                    foreach ($bill->billProducts as $item) {
                        $quantity = $item->quantity - $item->pivot->first()->quantity;
                        // dd($quantity, $item->quantity, $item->pivot->first()->quantity );
                        $this->productService->updateData(['quantity' => $quantity],$item->id);
                    }
                }
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
