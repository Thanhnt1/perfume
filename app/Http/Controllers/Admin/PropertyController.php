<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Property\IPropertyService;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(IPropertyService $IPropertyService)
    {
        $this->propertyService = $IPropertyService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->propertyService->fetchAllJSON($request);
        }

        return view('admin.properties.index');
    }

    /**
     * Show the application product.
     * @param string $id
     * @param PropertyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        try {
            $params = $request->all();

            // insert data property
            $property = $this->propertyService->createData($params);

            return redirect()->route('admin.properties.index')->with('message', trans('property.createSuccessfull'));
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
                $property = $this->propertyService->findByID($value);
                if ($property instanceof Property) {
                   $property->delete();
                } else {
                    return $this->responseJSON(false, trans('property.notFound'));
                }
            }
        }
        return redirect()->route('admin.properties.index')->with('message', trans('property.removedSuccessfull'));
    }

    /**
     * Update the specified resource in storage.
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $property = $this->propertyService->findByID($request->id);
        if ($property instanceof Property) {
            try {
                $params = $request->all();

                // Open transaction
                DB::beginTransaction();
                //

                $property = $this->propertyService->updateData($params, $property->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('admin.properties.index')->with('message', trans('property.updateSuccessfull'));
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
