<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel\Router\Router;

session_start();

try {
    [$controller, $action, $arguments] = (new Router())->map($_SERVER['REQUEST_URI']);
} catch (\App\Kernel\Router\Exception\PageNotFoundException $e) {
    header('Location: error');
}
//$temp = [...$arguments];
//var_dump($temp);
//die;

call_user_func([new $controller, $action], ...$arguments);