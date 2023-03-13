<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class MigrationLoaderExtension implements Extension
{
    use Concerns\HasMigrationFilePath;

    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        foreach ($package->migrationFileNames as $migrationFileName) {
            if ($package->runsMigrations) {
                $serviceProvider->forwardLoadMigrationsFrom($this->getMigrationFilePath($package, $migrationFileName));
            }
        }
    }
}
