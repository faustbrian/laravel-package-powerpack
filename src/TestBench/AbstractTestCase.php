<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\TestBench;

use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    use Concerns\InteractsWithMockery;
}
