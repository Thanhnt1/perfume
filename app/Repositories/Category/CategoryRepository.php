<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Role;
class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Category";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*')
        ->whereNull($this->model->getTable().'.deleted_at');
    }
}