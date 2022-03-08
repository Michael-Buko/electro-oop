<?php

namespace App\Kernel\View;

use App\Kernel\View\Exception\TemplateFileNotFound;

class HtmlEngine implements FormatEngine
{

    public function render(string $templatePath, array $variables)
    {
        $fullTemplatePath = self::VIEW_FOLDER_PATH . $templatePath . '.php';
        if (!file_exists($fullTemplatePath)) {
            throw new TemplateFileNotFound(sprintf('Template %s not exist', $templatePath));
        }

        foreach ($variables as $variable => $value) {
            ${$variable} = $value;
        }

        require_once $fullTemplatePath;
    }
}