<?php
namespace App\Repositories\ShippingDepartment;

use App\Repositories\BaseRepository;
use App\Models\ShippingDepartment;
class ShippingDepartmentRepository extends BaseRepository implements IShippingDepartmentRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\ShippingDepartment";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }

    public function fetchTypeData()
    {
        return \DB::table('type_shipping')->select('*')->whereNull('deleted_at');
    }
}