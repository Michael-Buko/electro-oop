<?php

namespace App\Kernel;

use App\Kernel\Router\Router;

class Kernel
{
    public static function handle()
    {
        session_start();

        try {
            [$controller, $action, $arguments] = (new Router())->map($_SERVER['REQUEST_URI']);
        } catch (\App\Kernel\Router\Exception\PageNotFoundException $e) {
            header('Location: error');
        }

        call_user_func([new $controller, $action], ...$arguments);
    }
}