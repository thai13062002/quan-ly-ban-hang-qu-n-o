<?php

namespace App\Services\User;

use App\Models\Order;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    /**
     * Register User
     *
     * @param $data
     */
    public function register($data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Change password
     *
     * @param $data
     */
    public function changePassword($data){
        $user = auth()->user();
        if (!$user){
            abort(404);
        }
        $user->update([
            'password' => Hash::make($data['password'])
        ]);
    }
}
