<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\Role;
class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Customer";
    }

    public function fetchData()
    {
        return \DB::table($this->model->getTable())->select('*');
        // ->whereNull($this->model->getTable().'.deleted_at');
    }
}