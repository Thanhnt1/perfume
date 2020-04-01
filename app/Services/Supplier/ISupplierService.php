<?php
namespace App\Services\Supplier;

use App\Services\IBaseService;
use App\Models\Supplier;
use Illuminate\Http\Request;

interface ISupplierService extends IBaseService
{
    public function fetchAllJSON();
}