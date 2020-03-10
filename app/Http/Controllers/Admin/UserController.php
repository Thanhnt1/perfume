<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\IUserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(IUserService $IUserService)
    {
        $this->userService = $IUserService;
    }
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->userService->fetchAllJSON($request);
        }

        return view('admin.users.index');
    }
}
