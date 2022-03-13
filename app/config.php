<?php

use App\Controller\HomeController;
use App\Controller\ProductController;

return [

    'navigation' => [
        'Home' => '/index',
        'Hot Deals' => '/blank',
        'Categories' => '#',
        'Laptops' => '/product/123',
        'Smartphones' => '#',
        'Cameras' => '#',
        'Accessories' => '#',
    ],

    'db' => [
        'host' => 'localhost',
        'name' => 'electro',
        'port' => '3306',
        'user' => 'homestead',
        'password' => 'secret'
    ],

    'router' => [
        '/' => [HomeController::class, 'indexAction'],
        '/index' => [HomeController::class, 'indexAction'],
        '/login' => [HomeController::class, 'loginAction'],
        '/logout' => [HomeController::class, 'logoutAction'],
        '/error' => [HomeController::class, 'errorAction'],
        '/product/(?P<id>.+)' => [ProductController::class, 'productAction'],
    ],

];