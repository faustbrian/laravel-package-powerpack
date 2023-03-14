<?php

declare(strict_types=1);

namespace Tests;

use PreemStudio\Jetpack\TestBench\AbstractPackageTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;
use Tests\Fixtures\ServiceProviderStub;

abstract class TestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass(): string
    {
        return ServiceProviderStub::class;
    }

    protected function getRequiredServiceProviders(): array
    {
        return [LaravelDataServiceProvider::class];
    }
}
