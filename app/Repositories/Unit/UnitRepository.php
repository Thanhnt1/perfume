<?php
namespace App\Repositories\Unit;

use App\Repositories\BaseRepository;
use App\Models\Unit;
class UnitRepository extends BaseRepository implements IUnitRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Unit";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}