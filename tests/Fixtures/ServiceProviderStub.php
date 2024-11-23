<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;

final class ServiceProviderStub extends AbstractServiceProvider
{
    protected $defer = false;

    public function packageRegistered(): void
    {
        $this->app->singleton('testbench.foostub', function (): FooStub {
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
