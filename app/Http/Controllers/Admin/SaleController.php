<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Sale\ISaleService;
use App\Http\Requests\SRequest;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(ISaleService $ISaleService)
    {
        $this->saleService = $ISaleService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->saleService->fetchAllJSON($request);
        }

        return view('admin.promotions.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param SaleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $params = $request->all();
            $params['price'] = str_replace(",", "", $params['price']);
            $params['code'] = strtoupper($params['code']);

            // insert data sale
            $sale = $this->saleService->createData($params);

            return redirect()->route('admin.promotions.index')->with('message', trans('sale.createSuccessfull'));
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
                $sale = $this->saleService->findByID($value);
                if ($sale instanceof Sale) {
                   $sale->delete();
                } else {
                    return $this->responseJSON(false, trans('sale.notFound'));
                }
            }
        }
        return redirect()->route('admin.promotions.index')->with('message', trans('sale.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $sale = $this->saleService->findByID($request->id);
        if ($sale instanceof Sale) {
            try {
                $params = $request->all();
                $params['price'] = str_replace(",", "", $params['price']);
                $params['code'] = strtoupper($params['code']);
                
                // Open transaction
                DB::beginTransaction();
                //

                $sale = $this->saleService->updateData($params, $sale->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.promotions.index')->with('message', trans('sale.updateSuccessfull'));
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
