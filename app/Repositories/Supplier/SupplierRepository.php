<?php
namespace App\Repositories\Supplier;

use App\Repositories\BaseRepository;
use App\Models\Supplier;
class SupplierRepository extends BaseRepository implements ISupplierRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Supplier";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}