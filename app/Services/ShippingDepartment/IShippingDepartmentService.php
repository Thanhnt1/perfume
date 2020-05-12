<?php
namespace App\Services\ShippingDepartment;

use App\Services\IBaseService;
use App\Models\ShippingDepartment;
use Illuminate\Http\Request;

interface IShippingDepartmentService extends IBaseService
{
    public function fetchAllJSON();
    public function fetchAllTypeJSON();
}