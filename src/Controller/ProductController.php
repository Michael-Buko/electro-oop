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
        $this->render('Product/product', [
            'user' => AuthService::getEmail(),
            'navigation' => Config::getNavigation(),
            'categories' => Category::findAll(),
            'product' => Product::findById($id),
            'images' => Image::findByProductId($id),
            'productRating' => 2,
            'amountRating' => 2,
        ]);
    }
}