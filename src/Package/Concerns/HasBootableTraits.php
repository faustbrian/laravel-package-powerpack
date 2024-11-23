<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\PackagePowerPack\Package\Concerns;

trait HasBootableTraits
{
    private array $traitInitializers = [];

    private function bootTraits(): void
    {
        $class = static::class;

        $booted = [];

        $this->traitInitializers[$class] = [];

        foreach (class_uses_recursive($class) as $trait) {
            $method = 'boot'.class_basename($trait);

            if (\method_exists($class, $method) && !\in_array($method, $booted, true)) {
                $this->{$method}();

                $booted[] = $method;
            }

            if (\method_exists($class, $method = 'initialize'.class_basename($trait))) {
                $this->traitInitializers[$class][] = $method;

                $this->traitInitializers[$class] = \array_unique(
                    $this->traitInitializers[$class],
                );
            }
        }
    }
}
