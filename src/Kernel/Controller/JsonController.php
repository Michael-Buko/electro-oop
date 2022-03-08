<?php

namespace App\Kernel\Controller;

use App\Kernel\View\HtmlEngine;

class JsonController
{
    protected function render(string $template, array $variables = [])
    {
        $engine = new JsonEngine();

        $engine->render($template, $variables);
    }
}