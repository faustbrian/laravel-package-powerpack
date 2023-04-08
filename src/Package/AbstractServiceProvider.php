<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package;

use Illuminate\Support\ServiceProvider;
use PreemStudio\Jetpack\Package\Concerns\HasAutomaticConfiguration;
use PreemStudio\Jetpack\Package\Concerns\HasBootableTraits;
use PreemStudio\Jetpack\Package\Concerns\HasComposerJson;
use PreemStudio\Jetpack\Package\Concerns\HasConsoleExtensions;
use PreemStudio\Jetpack\Package\Concerns\HasHooks;
use PreemStudio\Jetpack\Package\Concerns\HasProxyFunctions;
use PreemStudio\Jetpack\Package\Concerns\HasRuntimeExtensions;
use ReflectionClass;
use RuntimeException;

abstract class AbstractServiceProvider extends ServiceProvider
{
    use HasAutomaticConfiguration;
    use HasBootableTraits;
    use HasComposerJson;
    use HasConsoleExtensions;
    use HasHooks;
    use HasProxyFunctions;
    use HasRuntimeExtensions;

    protected Package $package;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->bootTraits();
    }

    public function register(): void
    {
        $this->registeringPackage();

        $this->package = new Package();

        $this->package->setBasePath($this->getPackageBaseDirectory());

        $this->configurePackage($this->package);

        if (empty($this->package->name)) {
            throw new RuntimeException('This package does not have a name. You can set one with `$package->name("yourName")`');
        }

        foreach ($this->package->configFileNames as $configFileName) {
            $this->mergeConfigFrom($this->package->rootPath("config/{$configFileName}.php"), $configFileName);
        }

        $this->packageRegistered();
    }

    public function boot(): void
    {
        $this->bootingPackage();

        if ($this->app->runningInConsole()) {
            foreach ($this->consoleExtensions as $consoleExtension) {
                $consoleExtension->execute($this, $this->package);
            }
        }

        foreach ($this->runtimeExtensions as $runtimeExtension) {
            $runtimeExtension->execute($this, $this->package);
        }

        $this->packageBooted();
    }

    protected function getPackageBaseDirectory(): string
    {
        $fileName = (new ReflectionClass(\get_class($this)))->getFileName();

        if (\is_string($fileName)) {
            return \dirname($fileName);
        }

        throw new RuntimeException('Could not determine the base directory of the package');
    }
}
