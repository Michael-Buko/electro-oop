<?php

namespace App\Service;

class SessionService
{
    public static function start(): void
    {
        session_start();
    }

    public static function add(array $parameters)
    {
        $_SESSION['user'] = $parameters;
    }

    public static function sessionDestroy()
    {
        session_destroy();
    }
}