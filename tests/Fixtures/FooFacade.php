<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Support\Facades\Facade;

final class FooFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'testbench.foostub';
    }
}
