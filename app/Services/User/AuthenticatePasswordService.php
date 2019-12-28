<?php
namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class AuthenticatePasswordService implements AuthenticatePasswordInterface
{
    /**
     * @param string $email
     * @param string $candidate
     * @return bool
     */
    public function passesAuthentication($email, $candidate) : bool
    {
        $credentials = ['email' => $email, 'password' => $candidate];

        return Auth::attempt($credentials);
    }
}
