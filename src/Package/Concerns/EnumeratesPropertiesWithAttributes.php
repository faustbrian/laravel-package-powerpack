<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Concerns;

use ReflectionClass;

trait EnumeratesPropertiesWithAttributes
{
    protected function enumeratePropertiesWithAttributes(): array
    {
        $reflection = new ReflectionClass(static::class);

        $result = [];
        foreach ($reflection->getProperties() as $property) {
            if (count($property->getAttributes()) > 0) {
                $result[$property->getName()] = $property->getAttributes();
            }
        }

        return $result;
    }
}
