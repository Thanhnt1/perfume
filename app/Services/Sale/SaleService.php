<?php
namespace App\Services\Sale;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleService extends BaseService implements ISaleService
{

    public function repository()
    {
        return "App\\Repositories\\Sale\ISaleRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $sales = $this->repository->fetchData();
        
        return datatables()->of($sales)->make(true);
    }
}