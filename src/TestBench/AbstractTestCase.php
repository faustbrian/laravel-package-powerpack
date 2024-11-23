<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\PackagePowerPack\TestBench;

use Orchestra\Testbench\TestCase;

/**
 * @internal
 */
abstract class AbstractTestCase extends TestCase
{
    use Concerns\InteractsWithMockery;
}
