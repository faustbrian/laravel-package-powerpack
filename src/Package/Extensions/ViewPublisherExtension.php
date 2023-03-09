<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ViewPublisherExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        if ($package->hasViews) {
            $serviceProvider->forwardPublishes([
                $package->basePath('/../resources/views') => base_path("resources/views/vendor/{$this->packageView($package)}"),
            ], "{$this->packageView($package)}-views");
        }
    }

    private function packageView(Package $package)
    {
        if (is_null($package->viewNamespace())) {
            return $package->shortName();
        }

        return $package->viewNamespace;
    }
}
