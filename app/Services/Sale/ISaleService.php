<?php
namespace App\Services\Sale;

use App\Services\IBaseService;
use App\Models\Sale;
use Illuminate\Http\Request;

interface ISaleService extends IBaseService
{
    public function fetchAllJSON();
}