<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Database\MigrationServiceProvider;
use PreemStudio\Jetpack\TestBench\AbstractAnalysisTestCase;
use Tests\Fixtures\BarStub;

final class AnalysisTest extends AbstractAnalysisTestCase
{
    protected static function getPaths(): array
    {
        return [
            realpath(__DIR__.'/../src'),
            realpath(__DIR__),
        ];
    }

    protected static function getIgnored(): array
    {
        return [BarStub::class, MigrationServiceProvider::class];
    }
}
