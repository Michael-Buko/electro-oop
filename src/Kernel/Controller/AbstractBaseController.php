<?php

namespace App\Kernel\Controller;

abstract class AbstractBaseController
{
    protected abstract function render(string $template, array $variables = []);
}