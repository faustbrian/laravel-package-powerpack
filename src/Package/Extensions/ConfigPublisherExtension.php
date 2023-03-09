<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ConfigPublisherExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        foreach ($package->configFileNames as $configFileName) {
            $serviceProvider->forwardPublishes([
                $package->basePath("/../config/{$configFileName}.php") => config_path("{$configFileName}.php"),
            ], "{$package->shortName()}-config");
        }
    }
}
