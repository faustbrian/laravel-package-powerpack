<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Commands;

use Closure;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PreemStudio\Jetpack\Package\Package;
use RuntimeException;

final class InstallCommand extends Command
{
    protected Package $package;

    public ?Closure $startWith = null;

    protected bool $shouldPublishConfigFile = false;

    protected bool $shouldPublishMigrations = false;

    protected bool $askToRunMigrations = false;

    protected bool $copyServiceProviderInApp = false;

    public ?Closure $endWith = null;

    public $hidden = true;

    public function __construct(Package $package)
    {
        $this->signature = $package->shortName().':install';

        $this->description = 'Install '.$package->name;

        $this->package = $package;

        parent::__construct();
    }

    public function handle(): void
    {
        if ($this->startWith) {
            ($this->startWith)($this);
        }

        if ($this->shouldPublishConfigFile) {
            $this->comment('Publishing config file...');

            $this->callSilently('vendor:publish', [
                '--tag' => "{$this->package->shortName()}-config",
            ]);
        }

        if ($this->shouldPublishMigrations) {
            $this->comment('Publishing migration...');

            $this->callSilently('vendor:publish', [
                '--tag' => "{$this->package->shortName()}-migrations",
            ]);
        }

        if ($this->askToRunMigrations) {
            if ($this->confirm('Would you like to run the migrations now?')) {
                $this->comment('Running migrations...');

                $this->call('migrate');
            }
        }

        if ($this->copyServiceProviderInApp) {
            $this->comment('Publishing service provider...');

            $this->copyServiceProviderInApp();
        }

        $this->info("{$this->package->shortName()} has been installed!");

        if ($this->endWith) {
            ($this->endWith)($this);
        }
    }

    public function publishConfigFile(): static
    {
        $this->shouldPublishConfigFile = true;

        return $this;
    }

    public function publishMigrations(): static
    {
        $this->shouldPublishMigrations = true;

        return $this;
    }

    public function askToRunMigrations(): static
    {
        $this->askToRunMigrations = true;

        return $this;
    }

    public function copyAndRegisterServiceProviderInApp(): static
    {
        $this->copyServiceProviderInApp = true;

        return $this;
    }

    public function startWith(Closure $callable): static
    {
        $this->startWith = $callable;

        return $this;
    }

    public function endWith(Closure $callable): static
    {
        $this->endWith = $callable;

        return $this;
    }

    protected function copyServiceProviderInApp(): static
    {
        $providerName = $this->package->publishableProviderName;

        if (! $providerName) {
            return $this;
        }

        $this->callSilent('vendor:publish', ['--tag' => $this->package->shortName().'-provider']);

        $namespace = Str::replaceLast('\\', '', $this->laravel->getNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (! is_string($appConfig)) {
            throw new RuntimeException('Could not read app config file.');
        }

        $class = '\\Providers\\'.$providerName.'::class';

        if (Str::contains($appConfig, $namespace.$class)) {
            return $this;
        }

        file_put_contents(config_path('app.php'), str_replace(
            "Illuminate\\View\ViewServiceProvider::class,",
            "Illuminate\\View\ViewServiceProvider::class,".PHP_EOL."        {$namespace}\Providers\\".$providerName.'::class,',
            $appConfig
        ));

        $serviceProviderTemplate = file_get_contents(app_path('Providers/'.$providerName.'.php'));

        if (empty($serviceProviderTemplate)) {
            throw new RuntimeException('Could not read service provider template.');
        }

        file_put_contents(app_path('Providers/'.$providerName.'.php'), str_replace(
            "namespace App\Providers;",
            "namespace {$namespace}\Providers;",
            $serviceProviderTemplate
        ));

        return $this;
    }
}
