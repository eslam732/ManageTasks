<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

public function register($data)
{
   
        request()->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
        
   return $this->userRepository->register($data);
}


public function login($data)
{
   
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        
   return $this->userRepository->login($data);
}


}