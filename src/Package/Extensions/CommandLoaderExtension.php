<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class CommandLoaderExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        if (!empty($package->commands)) {
            $serviceProvider->forwardCommands($package->commands);
        }
    }
}
