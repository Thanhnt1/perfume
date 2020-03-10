<?php
namespace App\Services\User;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UserService extends BaseService implements IUserService
{

    public function repository()
    {
        return "App\\Repositories\\User\IUserRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $users = $this->repository->fetchData();
        
        return datatables()->of($users)->make(true);
    }
}