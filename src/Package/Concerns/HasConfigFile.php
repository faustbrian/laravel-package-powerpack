<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait HasConfigFile
{
    public string $name;

    public array $configFileNames = [];

    public function hasConfigFile(array|string $configFileName = null): static
    {
        $configFileName ??= $this->shortName();

        if (!\is_array($configFileName)) {
            $configFileName = [$configFileName];
        }

        $this->configFileNames = $configFileName;

        return $this;
    }
}
