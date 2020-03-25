<?php
namespace App\Services\Property;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyService extends BaseService implements IPropertyService
{

    public function repository()
    {
        return "App\\Repositories\\Property\IPropertyRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $properties = $this->repository->fetchData();
        
        return datatables()->of($properties)->make(true);
    }
}