<?php
namespace App\Services\User;

interface UpdatePasswordInterface
{
    public function attemptToUpdatePassword($email, $currentPassword, $newPassword): bool;
}
