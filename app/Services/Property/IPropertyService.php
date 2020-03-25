<?php
namespace App\Services\Property;

use App\Services\IBaseService;
use App\Models\Property;
use Illuminate\Http\Request;

interface IPropertyService extends IBaseService
{
    public function fetchAllJSON();
}