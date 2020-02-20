<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promotions.index');
    }
}
