<?php

declare(strict_types=1);

namespace Tests\Concerns;

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Fixtures\BarStub;
use Tests\Fixtures\FooFacade;
use Tests\Fixtures\FooStub;
use Tests\Fixtures\ServiceProviderStub;

it('should be a facade with an accessor and root', function (): void {
    expect(FooFacade::class)->toBeFacade('testbench.foostub', FooStub::class);
});

it('should be a facade provider', function (): void {
    expect(ServiceProviderStub::class)->toBeFacadeProvider('testbench.foostub');
});

it('should be injectable', function (): void {
    expect(FooStub::class)->toBeInjectable();
});

it('should not be injectable', function (): void {
    expect(BarStub::class)->toBeInjectable();
})->throws(ExpectationFailedException::class);

it('should create an instance and return the injected value', function (): void {
    expect($this->app->make(FooStub::class)->getBar())->toBe('baz');
});
