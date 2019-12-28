<?php
namespace App\Services\User;

interface AuthenticatePasswordInterface
{
    /**
     * @param string $email
     * @param string $candidate
     * @return bool
     */
    public function passesAuthentication($email, $candidate) : bool;
}
