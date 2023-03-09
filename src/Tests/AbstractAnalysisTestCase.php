<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Tests;

use GrahamCampbell\Analyzer\AnalysisTrait;
use PHPUnit\Framework\TestCase;

abstract class AbstractAnalysisTestCase extends TestCase
{
    use AnalysisTrait;

    protected static function getPaths(): array
    {
        return [];
    }

    protected static function getIgnored(): array
    {
        return [];
    }
}
