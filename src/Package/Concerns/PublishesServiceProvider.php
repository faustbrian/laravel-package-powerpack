<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

trait PublishesServiceProvider
{
    public ?string $publishableProviderName = null;

    public function publishesServiceProvider(string $providerName): static
    {
        $this->publishableProviderName = $providerName;

        return $this;
    }
}
