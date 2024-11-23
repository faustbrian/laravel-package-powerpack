<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use Illuminate\Support\Facades\Facade;

final class FooFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'testbench.foostub';
    }
}
