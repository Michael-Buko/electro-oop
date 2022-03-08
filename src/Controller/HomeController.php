<?php

namespace App\Controller;

use App\Kernel\Controller\BaseController;
use App\Model\Category;
use App\Model\Product;
use App\Service\AuthService;

class HomeController extends BaseController
{
    public function indexAction(): void
    {
        $auth = new AuthService;
        if (!empty($_GET['action']) && 'GET' === $_SERVER['REQUEST_METHOD'] && $_GET['action'] === 'logout') {
            $auth->logout();
            header('Location: /index');
        }

        $this->render('Home/index', [
            'user' => $_SESSION['user']['email'] ?? null,
            'namePage' => pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'],
            'navigation' => include __DIR__ . '/../../app/config/navigation.php',
            'categories' => Category::findAll(),
            'products' => Product::findAllJoin(),

        ]);
    }

    public function loginAction(): void
    {
        $auth = new AuthService;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            try {
                $auth->login($email, $password);
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        if ($auth->isAuth($_SESSION['user'] ?? null)) {
            header('Location: /index');
        }

        $this->render('Home/login', [
            'errorMessage' => $error ?? '',
            'navigation' => include __DIR__ . '/../../app/config/navigation.php',
        ]);
    }

    public function errorAction(): void
    {
        $this->render('Home/error',[
            'navigation' => include __DIR__ . '/../../app/config/navigation.php',
        ]);
    }

    public function aboutAction(): void
    {
        $this->render('Home/about');
    }

}