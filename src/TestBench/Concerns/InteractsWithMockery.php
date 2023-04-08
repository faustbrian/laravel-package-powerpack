<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\TestBench\Concerns;

use Mockery;

trait InteractsWithMockery
{
    /**
     * @after
     */
    public function tearDownMockery(): void
    {
        if (\class_exists(Mockery::class, false)) {
            $this->addToAssertionCount(Mockery::getContainer()->mockery_getExpectationCount());

            Mockery::close();
        }
    }
}
