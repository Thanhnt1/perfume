<?php
namespace App\Services\User;

use App\Services\IBaseService;
use App\Models\User;
use Illuminate\Http\Request;

interface IUserService extends IBaseService
{
    public function fetchAllJSON();
}