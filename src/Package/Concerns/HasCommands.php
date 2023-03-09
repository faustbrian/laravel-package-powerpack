<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasCommands
{
    public array $commands = [];

    public function hasCommand(string $commandClassName): self
    {
        $this->commands[] = $commandClassName;

        return $this;
    }

    public function hasCommands(array $commandClassNames): self
    {
        $this->commands = array_merge($this->commands, collect($commandClassNames)->flatten()->toArray());

        return $this;
    }
}
