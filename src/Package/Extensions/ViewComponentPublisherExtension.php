<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ViewComponentPublisherExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        if (count($package->viewComponents)) {
            $serviceProvider->forwardPublishes([
                $package->basePath('/Components') => base_path("app/View/Components/vendor/{$package->shortName()}"),
            ], "{$package->name}-components");
        }
    }
}
