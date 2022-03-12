<?php

namespace App\Controller;

use App\Kernel\Config;
use App\Kernel\Controller\BaseController;
use App\Model\Category;
use App\Model\Image;
use App\Model\Product;
use App\Service\AuthService;

class ProductController extends BaseController
{
    public function productAction(int $id): void
    {
        $auth = new AuthService;
        if (!empty($_GET['action']) && 'GET' === $_SERVER['REQUEST_METHOD'] && $_GET['action'] === 'logout') {
            $auth->logout();
            header('Location: /index');
        }

        $this->render('Product/product', [
            'user' => $_SESSION['user']['email'] ?? null,
            'namePage' => pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'],
            'navigation' => Config::getNavigation(),
            'categories' => Category::findAll(),
            'product' => Product::findById($id),
            'images' => Image::findByProductId($id),
            'productRating' => 2,
            'amountRating' => 2,
        ]);
    }
}