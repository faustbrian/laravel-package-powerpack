<?php

declare(strict_types=1);

namespace Tests;

use PreemStudio\Jetpack\TestBench\AbstractPackageTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;
use Tests\Fixtures\ServiceProviderStub;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected static function getServiceProviderClass(): string
    {
        return ServiceProviderStub::class;
    }

    protected static function getRequiredServiceProviders(): array
    {
        return [LaravelDataServiceProvider::class];
    }
}
