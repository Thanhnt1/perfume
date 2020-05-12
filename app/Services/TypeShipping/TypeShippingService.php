<?php
namespace App\Services\TypeShipping;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\TypeShipping;
use Illuminate\Http\Request;

class TypeShippingService extends BaseService implements ITypeShippingService
{

    public function repository()
    {
        return "App\\Repositories\\TypeShipping\ITypeShippingRepository";
    }

}