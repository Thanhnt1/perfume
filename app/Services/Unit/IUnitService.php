<?php
namespace App\Services\Unit;

use App\Services\IBaseService;
use App\Models\Unit;
use Illuminate\Http\Request;

interface IUnitService extends IBaseService
{
    public function fetchAllJSON();
}