<?php
namespace App\Repositories\Sale;

use App\Repositories\BaseRepository;
use App\Models\Sale;

class SaleRepository extends BaseRepository implements ISaleRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Sale";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}