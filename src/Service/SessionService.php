<?php

namespace App\Service;

class SessionService
{
    public static function sessionStart(string $email, string $role)
    {
        session_start();
        $_SESSION['user'] = ['email' => $email, 'role' => $role];
    }

    public static function sessionDestroy()
    {
        session_destroy();
    }
}