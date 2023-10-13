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
   
       
        
   return $this->userRepository->register($data);
}


public function login($data)
{
        
   return $this->userRepository->login($data);
}


}