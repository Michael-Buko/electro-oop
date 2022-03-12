<?php

namespace App\Kernel\Router;

use App\Kernel\Config;
use App\Kernel\Router\Exception\PageNotFoundException;

class Router
{
    public function map(string $uri): array
    {
        $url = $this->getURL($uri);
        foreach (Config::getRouter() as $route => $handler) {
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