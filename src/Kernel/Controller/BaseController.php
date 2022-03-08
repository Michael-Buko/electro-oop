<?php

namespace App\Kernel\Controller;

use App\Kernel\View\HtmlEngine;

class BaseController extends AbstractBaseController
{
    protected function render(string $template, array $variables = [])
    {
        $engine = new HtmlEngine();

        $engine->render($template, $variables);
    }
}