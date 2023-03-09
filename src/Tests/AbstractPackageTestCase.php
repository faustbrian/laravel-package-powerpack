<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Tests;

abstract class AbstractPackageTestCase extends AbstractTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app->config->set('app.key', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');

        $app->config->set('cache.driver', 'array');

        $app->config->set('database.default', 'sqlite');
        $app->config->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app->config->set('mail.driver', 'log');

        $app->config->set('session.driver', 'array');
    }

    protected function getPackageProviders($app): array
    {
        $provider = static::getServiceProviderClass($app);

        if ($provider) {
            return array_merge(static::getRequiredServiceProviders(), [$provider]);
        }

        return static::getRequiredServiceProviders($app);
    }

    protected static function getRequiredServiceProviders(): array
    {
        return [];
    }

    protected static function getServiceProviderClass(): string
    {
        // this may be overwritten, and must be overwritten
        // if used with the service provider test case trait
        return '';
    }
}
