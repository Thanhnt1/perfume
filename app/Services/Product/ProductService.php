<?php
namespace App\Services\Product;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService extends BaseService implements IProductService
{

    public function repository()
    {
        return "App\\Repositories\\Product\IProductRepository";
    }

     /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $templates = $this->repository->fetchData();
        return datatables()->of($templates)->make(true);
    }
}