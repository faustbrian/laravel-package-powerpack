<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package;

use Illuminate\Support\ServiceProvider;
use PreemStudio\Jetpack\Package\Concerns\HasConsoleExtensions;
use PreemStudio\Jetpack\Package\Concerns\HasHooks;
use PreemStudio\Jetpack\Package\Concerns\HasProxyFunctions;
use PreemStudio\Jetpack\Package\Concerns\HasRuntimeExtensions;
use ReflectionClass;
use RuntimeException;

abstract class AbstractServiceProvider extends ServiceProvider
{
    use HasConsoleExtensions;
    use HasHooks;
    use HasProxyFunctions;
    use HasRuntimeExtensions;

    protected Package $package;

    abstract public function configurePackage(Package $package): void;

    public function register(): void
    {
        $this->registeringPackage();

        $this->package = new Package;

        $this->package->setBasePath($this->getPackageBaseDirectory());

        $this->configurePackage($this->package);

        if (empty($this->package->name)) {
            throw new RuntimeException('This package does not have a name. You can set one with `$package->name("yourName")`');
        }

        foreach ($this->package->configFileNames as $configFileName) {
            $this->mergeConfigFrom($this->package->basePath("/../config/{$configFileName}.php"), $configFileName);
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
        $reflector = new ReflectionClass(get_class($this));

        return dirname($reflector->getFileName());
    }
}
