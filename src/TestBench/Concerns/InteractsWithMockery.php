<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\PackagePowerPack\TestBench\Concerns;

trait InteractsWithMockery
{
    /**
     * @after
     */
    public function tearDownMockery(): void
    {
        if (\class_exists(\Mockery::class, false)) {
            $this->addToAssertionCount(\Mockery::getContainer()->mockery_getExpectationCount());

            \Mockery::close();
        }
    }
}
