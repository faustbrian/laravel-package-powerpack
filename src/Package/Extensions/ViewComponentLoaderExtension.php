<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ViewComponentLoaderExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        foreach ($package->viewComponents as $componentClass => $prefix) {
            $serviceProvider->forwardLoadViewComponentsAs($prefix, [$componentClass]);
        }
    }
}
