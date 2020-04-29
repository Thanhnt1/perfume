<?php
namespace App\Services\Cart;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartService extends BaseService implements ICartService
{

    public function repository()
    {
        return "App\\Repositories\\Cart\ICartRepository";
    }

}