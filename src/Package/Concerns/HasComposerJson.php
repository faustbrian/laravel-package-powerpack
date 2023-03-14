<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\Jetpack\Package\Package;
use RuntimeException;

trait HasComposerJson
{
    protected function getPackageManifest(Package $package): array
    {
        return json_decode(file_get_contents(realpath($package->rootPath('composer.json'))), true, 512, JSON_THROW_ON_ERROR);
    }

    protected function getPackageName(Package $package): string
    {
        return explode('/', $this->getPackageManifest($package)['name'])[1];
    }

    protected function getPackageNamespace(Package $package): string
    {
        $namespace = $this->getPackageManifest($package)['autoload']['psr-4'];

        if (is_array($namespace)) {
            return (string) array_key_first($namespace);
        }

        throw new RuntimeException('This package does not have a namespace.');
    }
}
