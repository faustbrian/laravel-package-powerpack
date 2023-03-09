<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class TranslationPublisherExtension implements Extension
{
    use Concerns\HasTranslationPath;

    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        if ($package->hasTranslations) {
            $serviceProvider->forwardPublishes([
                $package->basePath('/../resources/lang') => $this->getTranslationPath($package),
            ], "{$package->shortName()}-translations");
        }
    }
}
