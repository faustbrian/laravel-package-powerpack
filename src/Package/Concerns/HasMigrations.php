<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasMigrations
{
    public bool $runsMigrations = false;

    public array $migrationFileNames = [];

    public function runsMigrations(bool $runsMigrations = true): static
    {
        $this->runsMigrations = $runsMigrations;

        return $this;
    }

    public function hasMigration(string $migrationFileName): static
    {
        $this->migrationFileNames[] = $migrationFileName;

        return $this;
    }

    public function hasMigrations(array $migrationFileNames): static
    {
        $this->migrationFileNames = \array_merge(
            $this->migrationFileNames,
            collect($migrationFileNames)->flatten()->toArray(),
        );

        return $this;
    }
}
