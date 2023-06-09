<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService {

    public function __construct(
        protected User $model)
    {
    }

    public function registrarUsuario($userPayload) {
        return $this->model->create([
            'name' => $userPayload['name'],
            'email' => $userPayload['email'],  
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($userPayload['password']),
            'remember_token' => Str::random(10),
        ]);
    }
}