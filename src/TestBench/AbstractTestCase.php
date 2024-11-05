<?php

declare(strict_types=1);

namespace BaseCodeOy\PackagePowerPack\TestBench;

use Orchestra\Testbench\TestCase;

/**
 * @internal
 */
abstract class AbstractTestCase extends TestCase
{
    use Concerns\InteractsWithMockery;
}
