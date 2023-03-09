<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions\Concerns;

use PreemStudio\Jetpack\Package\Package;

trait HasTranslationPath
{
    protected function getTranslationPath(Package $package): string
    {
        $langPath = 'vendor/'.$package->shortName();

        if (function_exists('lang_path')) {
            return lang_path($langPath);
        }

        return resource_path('lang/'.$langPath);
    }
}
