<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions\Concerns;

use PreemStudio\Jetpack\Package\Package;

trait HasMigrationFilePath
{
    protected function getMigrationFilePath(Package $package, string $migrationFileName): string
    {
        $filePath = $package->basePath("/../database/migrations/{$migrationFileName}.php");

        if (! file_exists($filePath)) {
            $filePath .= '.stub';
        }

        return $filePath;
    }
}
