<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ServiceProviderPublisherExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        if ($package->publishableProviderName) {
            $serviceProvider->forwardPublishes([
                $package->basePath("/../resources/stubs/{$package->publishableProviderName}.php.stub") => base_path("app/Providers/{$package->publishableProviderName}.php"),
            ], "{$package->shortName()}-provider");
        }
    }
}
