<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use Illuminate\Support\Str;

trait HasName
{
    public string $name;

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function shortName(): string
    {
        return Str::after($this->name, 'laravel-');
    }
}
