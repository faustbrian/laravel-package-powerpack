<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class TranslationLoaderExtension implements Extension
{
    use Concerns\HasTranslationPath;

    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        $serviceProvider->forwardLoadTranslationsFrom(
            $package->rootPath('resources/lang/'),
            $package->shortName()
        );

        $serviceProvider->forwardLoadJsonTranslationsFrom($package->rootPath('resources/lang/'));

        $serviceProvider->forwardLoadJsonTranslationsFrom($this->getTranslationPath($package));
    }
}
