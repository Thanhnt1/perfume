<?php
namespace App\Services\Category;

use App\Services\IBaseService;
use App\Models\Category;
use Illuminate\Http\Request;

interface ICategoryService extends IBaseService
{
    public function fetchAllJSON();
}