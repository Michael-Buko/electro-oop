<?php

namespace App\Kernel\Router;

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Kernel\Router\Exception\PageNotFoundException;

class Router
{
    private const AVAILABLE_PROJECT_PATH = [
        '/' => [HomeController::class, 'indexAction'],
        '/index' => [HomeController::class, 'indexAction'],
        '/login' => [HomeController::class, 'loginAction'],
        '/error' => [HomeController::class, 'errorAction'],
        '/product/(?P<id>.+)' => [ProductController::class, 'productAction'],
    ];

    public function map(string $uri): array
    {
        $url = $this->getURL($uri);
        foreach (self::AVAILABLE_PROJECT_PATH as $route => $handler) {
            $route = str_replace('/', '\/', $route);
            preg_match('/^' . $route . '$/', $url, $mathes);
            if (!empty($mathes)) {
                $arguments = array_filter($mathes, 'is_string', ARRAY_FILTER_USE_KEY);

                return [...$handler, $arguments];
            }
        }

        throw new PageNotFoundException(sprintf('Page %s not found', $uri));
    }

    private function getURL(string $uri): string
    {
        return explode('?', $uri)[0];
    }
}