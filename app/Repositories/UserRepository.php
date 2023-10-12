<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Session;

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
            'name' => $user->name,
            'id' => $user->id,
        ];

        auth()->login($user);
        return $viewData;

    }

    public function login($data)
    {

        $user = User::where('email', $data['email'])->first();
        return redirect()->route('login')->with('error', 'Invalid credentials');

        if (!auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return 'Incorrect email or password';
        }
        $viewData = [
            'name' => $user->name,
            'id' => $user->id,
        ];
        
        return $viewData;

    }

}
