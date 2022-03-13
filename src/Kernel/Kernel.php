<?php

namespace App\Kernel;

use App\Kernel\Router\Router;
use App\Service\SessionService;

class Kernel
{
    public static function handle()
    {
        SessionService::start();

        try {
            [$controller, $action, $arguments] = (new Router())->map($_SERVER['REQUEST_URI']);
        } catch (\App\Kernel\Router\Exception\PageNotFoundException $e) {
            header('Location: error');
        }

        call_user_func([new $controller, $action], ...$arguments);
        echo '<pre>';
//        var_dump($_SERVER);
        var_dump($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
        die;
    }
}