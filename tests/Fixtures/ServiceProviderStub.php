<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Support\ServiceProvider;

final class ServiceProviderStub extends ServiceProvider
{
    protected $defer = false;

    public function register(): void
    {
        $this->app->singleton('testbench.foostub', function ($app): FooStub {
            return new FooStub('baz');
        });

        $this->app->alias('testbench.foostub', FooStub::class);
    }

    public function provides(): array
    {
        return [
            'testbench.foostub',
        ];
    }
}
