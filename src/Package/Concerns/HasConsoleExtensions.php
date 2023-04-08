<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Extensions\AssetPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\ConfigPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\MigrationLoaderExtension;
use PreemStudio\Jetpack\Package\Extensions\MigrationPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\TranslationPublisherExtension;
use PreemStudio\Jetpack\Package\Extensions\ViewPublisherExtension;

trait HasConsoleExtensions
{
    /**
     * @var Extension[]
     */
    private array $consoleExtensions = [];

    public function bootHasConsoleExtensions(): void
    {
        $this->consoleExtensions = $this->defaultConsoleExtensions();
    }

    public function addConsoleExtension(Extension $extension): void
    {
        $this->consoleExtensions[] = $extension;
    }

    protected function defaultConsoleExtensions(): array
    {
        return [
            new ConfigPublisherExtension(),
            new ViewPublisherExtension(),
            new MigrationPublisherExtension(),
            new MigrationLoaderExtension(),
            new migrationloaderExtension(),
            new TranslationPublisherExtension(),
            new AssetPublisherExtension(),
        ];
    }
}
