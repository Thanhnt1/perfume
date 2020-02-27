<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;
class ProductRepository extends BaseRepository implements IProductRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Product";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->selectRaw($this->model->getTable().'.name as product_name')
        ->selectRaw('categories.name as category_name')
        ->selectRaw('suppliers.name as supplier_name')
        ->selectRaw('units.name as unit_name')
        ->leftJoin('categories', 'categories.id', $this->model->getTable().'.category_id')
        ->leftJoin('suppliers', 'suppliers.id', $this->model->getTable().'.supplier_id')
        ->leftJoin('units', 'units.id', $this->model->getTable().'.unit_id');
    }
}