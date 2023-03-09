<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasAssets
{
    public bool $hasAssets = false;

    public function hasAssets(): static
    {
        $this->hasAssets = true;

        return $this;
    }
}
