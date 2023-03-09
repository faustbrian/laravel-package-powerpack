<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Database\MigrationServiceProvider;
use ReflectionClass;
use RuntimeException;

abstract class AbstractApplicationTestCase extends AbstractTestCase
{
    protected static function getBasePath(): string
    {
        $class = new ReflectionClass($this);

        $parents = [];

        // get an array of all the parent classes
        while ($parent = $class->getParentClass()) {
            $parents[] = $parent->getName();
            $class     = $parent;
        }

        // we want to select the penultimate class from the list of parents
        // this is because the class directly extending this must be the
        // abstract test case the user has used in their app
        $pos = count($parents) - 5;

        if ($pos < 0) {
            throw new RuntimeException('The base path could not be automatically determined.');
        }

        // get the reflection class for the selected class
        $selected = new ReflectionClass($parents[$pos]);

        // get the filepath of the selected class
        $path = $selected->getFileName();

        // return the filepath one up from the folder the selected class is saved in
        return realpath(dirname($path).'/../');
    }

    protected function getApplicationAliases($app): array
    {
        return $app->config['app.aliases'];
    }

    protected function getApplicationProviders($app): array
    {
        if (class_exists(MigrationServiceProvider::class)) {
            return array_merge($app->config['app.providers'], [MigrationServiceProvider::class]);
        }

        return $app->config['app.providers'];
    }

    protected function resolveApplication(): Application
    {
        return new Application(static::getBasePath());
    }

    protected static function getServiceProviderClass(): string
    {
        return '';
    }
}
