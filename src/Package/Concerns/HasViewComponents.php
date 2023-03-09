<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasViewComponents
{
    public array $viewComponents = [];

    public function hasViewComponent(string $prefix, string $viewComponentName): self
    {
        $this->viewComponents[$viewComponentName] = $prefix;

        return $this;
    }

    public function hasViewComponents(string $prefix, array $viewComponentNames): self
    {
        foreach ($viewComponentNames as $componentName) {
            $this->viewComponents[$componentName] = $prefix;
        }

        return $this;
    }
}
