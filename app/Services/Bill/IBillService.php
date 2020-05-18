<?php
namespace App\Services\Bill;

use App\Services\IBaseService;
use App\Models\Bill;
use Illuminate\Http\Request;

interface IBillService extends IBaseService
{
    public function fetchAllJSON();
}