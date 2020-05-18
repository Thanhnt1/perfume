<?php
namespace App\Repositories\Bill;

use App\Repositories\BaseRepository;
use App\Models\Bill;
class BillRepository extends BaseRepository implements IBillRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Bill";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select($this->model->getTable().'.*')
        ->selectRaw('customer.name as customer_name')
        ->selectRaw('admin.name as admin_name')
        ->selectRaw('type_shipping.name as type_shipping_name')
        ->leftJoin('customer', 'customer.id', $this->model->getTable().'.customer_id')
        ->leftJoin('admin', 'admin.id', $this->model->getTable().'.admin_id')
        ->leftJoin('type_shipping', 'type_shipping.id', $this->model->getTable().'.type_shipping_id')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}