<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Extensions;

use Carbon\Carbon;
use Illuminate\Support\Str;
use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Contracts\Extension;
use PreemStudio\Jetpack\Package\Package;

final class MigrationPublisherExtension implements Extension
{
    use Concerns\HasMigrationFilePath;

    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void
    {
        $now = Carbon::now();
        foreach ($package->migrationFileNames as $migrationFileName) {
            $filePath = $this->getMigrationFilePath($package, "/../database/migrations/{$migrationFileName}.php");

            $serviceProvider->forwardPublishes([
                $filePath => $this->generateMigrationName(
                    $migrationFileName,
                    $now->addSecond()
                ),
            ], "{$package->shortName()}-migrations");

            if ($package->runsMigrations) {
                $serviceProvider->forwardLoadMigrationsFrom($filePath);
            }
        }
    }

    private function generateMigrationName(string $migrationFileName, Carbon $now): string
    {
        $migrationsPath = 'migrations/';

        $length = strlen($migrationFileName) + 4;

        if (Str::contains($migrationFileName, '/')) {
            $migrationsPath .= Str::of($migrationFileName)->beforeLast('/')->finish('/')->toString();
            $migrationFileName = Str::of($migrationFileName)->afterLast('/')->toString();
        }

        $fileNames = glob(database_path("{$migrationsPath}*.php")) ?: [];

        foreach ($fileNames as $fileName) {
            if ((substr($fileName, -$length) === $migrationFileName.'.php')) {
                return $fileName;
            }
        }

        return database_path($migrationsPath.$now->format('Y_m_d_His').'_'.Str::of($migrationFileName)->snake()->finish('.php'));
    }
}
