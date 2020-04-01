<?php
namespace App\Services\Supplier;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierService extends BaseService implements ISupplierService
{

    public function repository()
    {
        return "App\\Repositories\\Supplier\ISupplierRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $suppliers = $this->repository->fetchData();
        
        return datatables()->of($suppliers)->make(true);
    }
}