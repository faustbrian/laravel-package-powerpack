<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use Composer\InstalledVersions;

trait HasComposerJson
{
    protected function getPackageName(): string
    {
        return explode('/', InstalledVersions::getRootPackage()['name'])[1];
    }

    protected function getPackageNamespace(): string
    {
        $directory = InstalledVersions::getRootPackage()['install_path'];

        return array_key_first(json_decode(file_get_contents("$directory/composer.json"), true)['autoload']['psr-4']);
    }
}
