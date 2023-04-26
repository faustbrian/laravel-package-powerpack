<?php

declare(strict_types=1);

namespace BombenProdukt\PackagePowerPack\TestBench;

use GrahamCampbell\Analyzer\AnalysisTrait;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * @internal
 */
abstract class AbstractAnalysisTestCase extends TestCase
{
    use AnalysisTrait;

    protected static function getPaths(): array
    {
        $paths = [];

        foreach (static::candidates() as $candidate) {
            $path = static::rootPath($candidate);

            if (\is_dir($path)) {
                $paths[] = $path;
            }
        }

        return $paths;
    }

    protected static function getIgnored(): array
    {
        return [];
    }

    private static function candidates(): array
    {
        return ['config', 'src', 'tests'];
    }

    private static function rootPath(string $directory): string
    {
        $basePath = \dirname((new ReflectionClass(static::class))->getFileName());
        $basePath = \realpath("{$basePath}/../../");

        return $basePath.\DIRECTORY_SEPARATOR.\ltrim($directory, \DIRECTORY_SEPARATOR);
    }
}
