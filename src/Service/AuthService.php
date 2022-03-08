<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Exception\UserNotFoundException;
use App\Model\Role;
use App\Model\User;

class AuthService
{
    public function login(string $email, string $password): void
    {
        $user = User::findByEmail($email);

        if ($user->getPassword() === md5($password)) {
            SessionService::sessionStart($user->getEmail(), Role::findById($user->getRoleId())->getRole());
        } else {
            throw new UserNotFoundException('Неверный логин или пароль');
        }
    }

    public function isAuth(?array $session): bool
    {
        if (!empty($session)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout(): void
    {
        SessionService::sessionDestroy();
    }
}