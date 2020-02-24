<?php
namespace App\Services\Product;

use App\Services\IBaseService;
use App\Models\Product;
use Illuminate\Http\Request;

interface IProductService extends IBaseService
{
    public function fetchAllJSON();
}