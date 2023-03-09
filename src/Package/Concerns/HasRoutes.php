<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasRoutes
{
    public array $routeFileNames = [];

    public function hasRoute(string $routeFileName): static
    {
        $this->routeFileNames[] = $routeFileName;

        return $this;
    }

    public function hasRoutes(array $routeFileNames): static
    {
        $this->routeFileNames = array_merge($this->routeFileNames, collect($routeFileNames)->flatten()->toArray());

        return $this;
    }
}
