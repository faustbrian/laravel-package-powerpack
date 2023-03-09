<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package\Contracts;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Package;

interface Extension
{
    public function execute(AbstractServiceProvider $serviceProvider, Package $package): void;
}
