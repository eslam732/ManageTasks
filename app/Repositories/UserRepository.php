<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
    
        $viewData = [
            'token' => $user->createToken('api-application')->accessToken,
            'name' => $user->name,
            'id' => $user->id,
        ];

        return  $viewData;
            
    }

    public function login($data)
    {
       
        $user=User::where('email',$data['email'])->first();
        if (!Hash::check(request()->password, $user->password)) {
             return 'Incorrect email or password';

        }
    
        $viewData = [
            'token' => $user->createToken('api-application')->accessToken,
            'name' => $user->name,
            'id' => $user->id,
        ];

        return  $viewData;
            
    }

}
