<?php
namespace App\Services\Bill;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillService extends BaseService implements IBillService
{

    public function repository()
    {
        return "App\\Repositories\\Bill\IBillRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $bills = $this->repository->fetchData();
        
        return datatables()->of($bills)
        ->editColumn('id_sprintf', function ($bills) {
            return sprintf('SF%07d', $bills->id);
        })->make(true);
    }
}