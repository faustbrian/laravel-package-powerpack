<?php

declare(strict_types=1);

namespace Tests;

use BaseCodeOy\PackagePowerPack\TestBench\AbstractPackageTestCase;
use Tests\Fixtures\ServiceProviderStub;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass(): string
    {
        return ServiceProviderStub::class;
    }
}
