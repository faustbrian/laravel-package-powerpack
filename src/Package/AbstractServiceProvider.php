<?php

declare(strict_types=1);

namespace BombenProdukt\PackagePowerPack\Package;

use BombenProdukt\PackagePowerPack\Package\Concerns\HasAutomaticConfiguration;
use BombenProdukt\PackagePowerPack\Package\Concerns\HasBootableTraits;
use BombenProdukt\PackagePowerPack\Package\Concerns\HasComposerJson;
use ReflectionClass;
use RuntimeException;
use Spatie\LaravelPackageTools\PackageServiceProvider;

abstract class AbstractServiceProvider extends PackageServiceProvider
{
    use HasAutomaticConfiguration;
    use HasBootableTraits;
    use HasComposerJson;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->bootTraits();
    }

    protected function getPackageBaseDirectory(): string
    {
        $fileName = (new ReflectionClass(\get_class($this)))->getFileName();

        if (\is_string($fileName)) {
            return \dirname($fileName);
        }

        throw new RuntimeException('Could not determine the base directory of the package.');
    }
}
