<?php
namespace App\Services\Unit;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitService extends BaseService implements IUnitService
{

    public function repository()
    {
        return "App\\Repositories\\Unit\IUnitRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $units = $this->repository->fetchData();
        
        return datatables()->of($units)->make(true);
    }
}