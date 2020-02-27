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
        $products = $this->repository->fetchData();

        return datatables()->of($products)
        ->editColumn('created_at', function ($product) {
            return $product->created_at ? with(new Carbon($product->created_at))->format(config('app.db_datetime_format')) : '';
        })
        ->make(true);
    }
}