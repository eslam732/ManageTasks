<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Exception;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->userService->register($request->all());
            return redirect()->route('tasks.index');
        } catch (Exception $e) {
            return view('signUpView', ['error' => $e->getMessage()]);

        }

    }

    public function renderRegisterForm()
    {

            if (auth()->user()) {
                return redirect()->route('tasks.index');

            }
            return view('signUp');

    }

    public function login(LoginRequest $request)
    {

        try {

            $this->userService->login($request);
            return redirect()->route('tasks.index');
        } catch (Exception $e) {
            return view('login', ['error' => $e->getMessage()]);
        }

    }
    public function renderLoginForm()
    {
        if (auth()->user()) {
            return redirect()->route('tasks.index');

        }
        return view('login');

    }
}
