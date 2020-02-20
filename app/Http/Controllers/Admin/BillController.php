<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bills.index');
    }

    /**
     * Show the application product.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderProccessingIndex()
    {
        return view('admin.order-proccessing.index');
    }
}
