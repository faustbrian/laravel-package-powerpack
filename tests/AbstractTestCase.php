<?php

declare(strict_types=1);

namespace Tests;

use PreemStudio\Jetpack\Tests\AbstractPackageTestCase;
use Tests\Fixtures\ServiceProviderStub;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected static function getServiceProviderClass(): string
    {
        return ServiceProviderStub::class;
    }
}
