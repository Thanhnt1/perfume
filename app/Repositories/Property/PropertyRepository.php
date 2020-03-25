<?php
namespace App\Repositories\Property;

use App\Repositories\BaseRepository;
use App\Models\Role;
class PropertyRepository extends BaseRepository implements IPropertyRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Property";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}