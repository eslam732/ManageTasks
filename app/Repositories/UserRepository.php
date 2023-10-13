<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($data)
    {
        try { $data['password'] = bcrypt($data['password']);
            $user = User::create($data);

            $viewData = [
                'name' => $user->name,
                'id' => $user->id,
            ];

            auth()->login($user);
            return $viewData;
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function login($data)
    {

        try {
            $user = User::where('email', $data['email'])->first();

            if (!auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {

                throw new Exception('Incorrect email or password');
            }

            return $user;

        } catch (Exception $e) {
            throw $e;

        }

    }

}
