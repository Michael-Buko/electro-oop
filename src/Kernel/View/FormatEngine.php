<?php

namespace App\Kernel\View;

interface FormatEngine
{
    public const VIEW_FOLDER_PATH = __DIR__ . '/../../View/';
    public function render(string $templatePath, array $variables);
}