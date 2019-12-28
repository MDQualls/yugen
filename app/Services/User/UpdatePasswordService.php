<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService implements UpdatePasswordInterface
{
    /**
     * @var AuthenticatePasswordInterface
     */
    private $authenticatePasswordService;

    public function __construct(AuthenticatePasswordInterface $authenticatePasswordService)
    {
        $this->authenticatePasswordService = $authenticatePasswordService;
    }

    /**
     * @param string $email
     * @param string $currentPassword
     * @param string $newPassword
     * @return bool
     */
    public function attemptToUpdatePassword($email, $currentPassword, $newPassword): bool
    {
        if (!$this->authenticatePasswordService->passesAuthentication($email, $currentPassword)) {
            return false;
        }

        /** @var User $user */
        $user = User::where('email', '=', $email)->first();

        if (!$user) {
            return false;
        }

        $user->password = Hash::make($newPassword);
        $user->update();

        return true;
    }

}
