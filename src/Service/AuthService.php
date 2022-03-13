<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Exception\UserNotFoundException;
use App\Model\Role;
use App\Model\User;

class AuthService
{
    public static function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = User::findByEmail($email);
            if ($user->getPassword() === md5($password)) {
                SessionService::add([
                    'email' => $user->getEmail(),
                    'role' => Role::findById($user->getRoleId())->getRole(),
                ]);
            } else {
                throw new UserNotFoundException('Неверный логин или пароль');
            }
        }
    }

    public static function isAuthorized(): bool
    {
        if (!empty($_SESSION['user'] ?? null)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getEmail(): string|null
    {
        if (!empty($_SESSION['user']['email'] ?? null)) {
            return $_SESSION['user']['email'];
        } else {
            return null;
        }
    }

    public static function getRole(): string|null
    {
        if (!empty($_SESSION['user']['role'] ?? null)) {
            return $_SESSION['user']['role'];
        } else {
            return null;
        }
    }

    public static function logout(): void
    {
        SessionService::sessionDestroy();
        header('Location: /index');
    }
}