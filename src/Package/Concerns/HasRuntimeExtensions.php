<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Extensions\RouteLoaderExtension;
use PreemStudio\Jetpack\Package\Extensions\ServiceProviderPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\TranslationLoaderExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewComponentLoaderExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewComponentPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewComposerPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewLoaderExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewSharePublisherExtension;

trait HasRuntimeExtensions
{
    /** @var Extension[] */
    private array $runtimeExtensions = [];

    public function bootHasRuntimeExtensions(): void
    {
        $this->runtimeExtensions = $this->defaultRuntimeExtensions();
    }

    public function addRuntimeExtension(Extension $extension): void
    {
        $this->runtimeExtensions[] = $extension;
    }

    protected function defaultRuntimeExtensions(): array
    {
        return [
            new TranslationLoaderExtension,
            new ViewLoaderExtension,
            new ViewComponentLoaderExtension,
            new ViewComponentPublisherExtension,
            new ServiceProviderPublisherExtension,
            new RouteLoaderExtension,
            new ViewSharePublisherExtension,
            new ViewComposerPublisherExtension,
        ];
    }
}
