<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasHooks
{
    public function registeringPackage(): void
    {
        //
    }

    public function packageRegistered(): void
    {
        //
    }

    public function bootingPackage(): void
    {
        //
    }

    public function packageBooted(): void
    {
        //
    }
}
