<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Unit\IUnitService;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    protected $unitService;

    public function __construct(IUnitService $IUnitService)
    {
        $this->unitService = $IUnitService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->unitService->fetchAllJSON($request);
        }

        return view('admin.units.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param UnitRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        try {
            $params = $request->all();

            // insert data unit
            $unit = $this->unitService->createData($params);

            return redirect()->route('admin.units.index')->with('message', trans('unit.createSuccessfull'));
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
                $unit = $this->unitService->findByID($value);
                if ($unit instanceof Unit) {
                   $unit->delete();
                } else {
                    return $this->responseJSON(false, trans('unit.notFound'));
                }
            }
        }
        return redirect()->route('admin.units.index')->with('message', trans('unit.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $unit = $this->unitService->findByID($request->id);
        if ($unit instanceof Unit) {
            try {
                $params = $request->all();

                // Open transaction
                DB::beginTransaction();
                //

                $unit = $this->unitService->updateData($params, $unit->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.units.index')->with('message', trans('unit.updateSuccessfull'));
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
