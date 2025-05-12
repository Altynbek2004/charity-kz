<?php

namespace App\Services\Auth;


use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;

class AuthService
{
    public function register(array $data)
    {
        return VerificationCode::create([
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
