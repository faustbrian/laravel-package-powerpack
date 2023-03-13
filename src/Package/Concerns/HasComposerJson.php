<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\ComposerParser\Package as Composer;
use PreemStudio\ComposerParser\PackageFactory;
use PreemStudio\Jetpack\Package\Package;
use RuntimeException;

trait HasComposerJson
{
    protected function getPackageManifest(Package $package): Composer
    {
        return PackageFactory::fromPath($package->basePath('..'));
    }

    protected function getPackageName(Package $package): string
    {
        return explode('/', $this->getPackageManifest($package)->name)[1];
    }

    protected function getPackageNamespace(Package $package): string
    {
        $namespace = $this->getPackageManifest($package)->autoload?->psr_4;

        if (is_array($namespace)) {
            return (string) array_key_first($namespace);
        }

        throw new RuntimeException('This package does not have a namespace.');
    }
}
