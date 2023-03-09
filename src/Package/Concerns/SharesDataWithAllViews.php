<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait SharesDataWithAllViews
{
    public array $sharedViewData = [];

    public function sharesDataWithAllViews(string $name, $value): self
    {
        $this->sharedViewData[$name] = $value;

        return $this;
    }
}
