<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasTranslations
{
    public bool $hasTranslations = false;

    public function hasTranslations(): self
    {
        $this->hasTranslations = true;

        return $this;
    }
}
