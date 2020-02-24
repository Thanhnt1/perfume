<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Role;
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
        return \DB::table($this->model->getTable())->select('*');
    }
}