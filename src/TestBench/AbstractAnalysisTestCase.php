<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\PackagePowerPack\TestBench;

use BaseCodeOy\Analyzer\AnalysisTrait;
use PHPUnit\Framework\TestCase;

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
        $basePath = \dirname((new \ReflectionClass(static::class))->getFileName());
        $basePath = \realpath("{$basePath}/../../");

        return $basePath.\DIRECTORY_SEPARATOR.\ltrim($directory, \DIRECTORY_SEPARATOR);
    }
}
