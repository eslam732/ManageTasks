<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        $data=request()->all();
       $viewData= $this->userService->register($data);
       return view('tasks', $viewData);
    }


    public function login()
    {
        $data=request()->all();
       $viewData= $this->userService->login($data);
       return view('tasks', $viewData);
    }
}
