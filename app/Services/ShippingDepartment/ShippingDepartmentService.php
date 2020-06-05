<?php
namespace App\Services\ShippingDepartment;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\ShippingDepartment;
use Illuminate\Http\Request;

class ShippingDepartmentService extends BaseService implements IShippingDepartmentService
{

    public function repository()
    {
        return "App\\Repositories\\ShippingDepartment\IShippingDepartmentRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $shippingDepartment = $this->repository->fetchData();
        
        return datatables()->of($shippingDepartment)->make(true);
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllTypeJSON(Request $request)
    {
        $typeShippingDepartment = $this->repository->fetchTypeData($request);
        
        return datatables()->of($typeShippingDepartment)->make(true);
    }
}