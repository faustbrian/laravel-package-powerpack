<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Tests;

use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    use Concerns\InteractsWithMockery;
}
