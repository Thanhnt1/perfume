<?php
namespace App\Repositories\ShippingDepartment;
use Illuminate\Http\Request;

interface IShippingDepartmentRepository
{
    public function fetchData();
    public function fetchTypeData(Request $request);
}