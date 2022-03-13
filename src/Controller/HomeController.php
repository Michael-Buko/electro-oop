<?php

namespace App\Controller;

use App\Kernel\Config;
use App\Kernel\Controller\BaseController;
use App\Model\Category;
use App\Model\Product;
use App\Service\AuthService;

class HomeController extends BaseController
{
    public function indexAction(): void
    {
        $this->render('Home/index', [
            'user' => AuthService::getEmail(),
            'navigation' => Config::getNavigation(),
            'categories' => Category::findAll(),
            'products' => Product::findAllJoin(),

        ]);
    }

    public function loginAction(): void
    {
        try {
            AuthService::login();
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        if (AuthService::isAuthorized()) {
            header('Location: /index');
        }

        $this->render('Home/login', [
            'errorMessage' => $error ?? '',
            'navigation' => Config::getNavigation(),
        ]);
    }

    public function logoutAction(): void
    {
        AuthService::logout();
    }

    public function errorAction(): void
    {
        $this->render('Home/error', [
            'user' => AuthService::getEmail(),
            'navigation' => Config::getNavigation(),
        ]);
    }

    public function aboutAction(): void
    {
        $this->render('Home/about');
    }

}