<?php
namespace App\Services\Product;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ->editColumn('avatar', function ($product) {
            // get image from dropbox and convert to base64
            return $product->avatar && Storage::disk('dropbox')->exists($product->avatar) ? 'data:image/jpeg;base64, '.base64_encode(Storage::disk('dropbox')->get($product->avatar)) : null;
        })
        ->editColumn('created_at', function ($product) {
            return $product->created_at ? with(new Carbon($product->created_at))->format(config('app.db_datetime_format')) : '';
        })
        ->make(true);
    }
}