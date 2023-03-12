<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\Jetpack\Package\Package;

trait HasComposerJson
{
    protected function getPackageManifest(Package $package): array
    {
        return json_decode(file_get_contents($package->basePath('../composer.json')), true);
    }

    protected function getPackageName(Package $package): string
    {
        return explode('/', $this->getPackageManifest($package)['name'])[1];
    }

    protected function getPackageNamespace(Package $package): string
    {
        return array_key_first($this->getPackageManifest($package)['autoload']['psr-4']);
    }
}
