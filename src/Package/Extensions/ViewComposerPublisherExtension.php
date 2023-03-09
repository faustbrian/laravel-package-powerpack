<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use Illuminate\Support\Facades\View;
use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class ViewComposerPublisherExtension implements Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        foreach ($package->viewComposers as $viewName => $viewComposer) {
            View::composer($viewName, $viewComposer);
        }
    }
}
