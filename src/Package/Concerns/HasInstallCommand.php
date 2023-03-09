<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use PreemStudio\Jetpack\Package\Commands\InstallCommand;

trait HasInstallCommand
{
    public array $commands = [];

    public function hasInstallCommand(callable $callable): self
    {
        $installCommand = new InstallCommand($this);

        $callable($installCommand);

        $this->commands[] = $installCommand;

        return $this;
    }
}
