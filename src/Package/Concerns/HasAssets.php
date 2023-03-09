<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasAssets
{
    public bool $hasAssets = false;

    public function hasAssets(): self
    {
        $this->hasAssets = true;

        return $this;
    }
}
