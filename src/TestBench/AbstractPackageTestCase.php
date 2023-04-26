<?php

declare(strict_types=1);

namespace BombenProdukt\PackagePowerPack\TestBench;

/**
 * @internal
 */
abstract class AbstractPackageTestCase extends AbstractTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app->config->set('app.key', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');

        $app->config->set('cache.driver', 'array');

        $app->config->set('database.default', 'sqlite');
        $app->config->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app->config->set('mail.driver', 'log');

        $app->config->set('session.driver', 'array');
    }

    protected function getPackageProviders($app): array
    {
        $provider = static::getServiceProviderClass($app);

        if ($provider) {
            return \array_merge($this->getRequiredServiceProviders(), [$provider]);
        }

        return $this->getRequiredServiceProviders($app);
    }

    protected function getRequiredServiceProviders(): array
    {
        return [];
    }

    abstract protected function getServiceProviderClass(): string;
}
