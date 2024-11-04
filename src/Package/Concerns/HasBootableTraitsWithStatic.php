<?php

declare(strict_types=1);

namespace BaseCodeOy\PackagePowerPack\Package\Concerns;

trait HasBootableTraitsWithStatic
{
    private static array $traitInitializers = [];

    private static function bootTraits(): void
    {
        $class = static::class;

        $booted = [];

        static::$traitInitializers[$class] = [];

        foreach (class_uses_recursive($class) as $trait) {
            $method = 'boot'.class_basename($trait);

            if (\method_exists($class, $method) && !\in_array($method, $booted, true)) {
                \forward_static_call([$class, $method]);

                $booted[] = $method;
            }

            if (\method_exists($class, $method = 'initialize'.class_basename($trait))) {
                static::$traitInitializers[$class][] = $method;

                static::$traitInitializers[$class] = \array_unique(
                    static::$traitInitializers[$class],
                );
            }
        }
    }
}
