<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasProxyFunctions
{
    public function forwardCommands(array $commands): void
    {
        $this->commands($commands);
    }

    public function forwardPublishes(array $paths, $groups = null)
    {
        $this->publishes($paths, $groups);
    }

    public function forwardLoadMigrationsFrom(string $path): void
    {
        $this->loadMigrationsFrom($path);
    }

    public function forwardLoadTranslationsFrom(string $path): void
    {
        $this->loadTranslationsFrom($path);
    }

    public function forwardLoadJsonTranslationsFrom(string $path): void
    {
        $this->loadJsonTranslationsFrom($path);
    }

    public function forwardLoadViewsFrom(string $path, string $namespace): void
    {
        $this->loadViewsFrom($path, $namespace);
    }

    public function forwardLoadViewComponentsAs(string $prefix, array $components): void
    {
        $this->loadViewComponentsAs($prefix, $components);
    }

    public function forwardLoadRoutesFrom(string $path): void
    {
        $this->loadRoutesFrom($path);
    }
}
