<?php

declare(strict_types=1);

namespace PreemStudio\Jetpack\Package;

use Illuminate\Support\Traits\Macroable;
use PreemStudio\Jetpack\Package\Concerns\HasAssets;
use PreemStudio\Jetpack\Package\Concerns\HasBasePath;
use PreemStudio\Jetpack\Package\Concerns\HasCommands;
use PreemStudio\Jetpack\Package\Concerns\HasConfigFile;
use PreemStudio\Jetpack\Package\Concerns\HasInstallCommand;
use PreemStudio\Jetpack\Package\Concerns\HasMigrations;
use PreemStudio\Jetpack\Package\Concerns\HasName;
use PreemStudio\Jetpack\Package\Concerns\HasRoutes;
use PreemStudio\Jetpack\Package\Concerns\HasTranslations;
use PreemStudio\Jetpack\Package\Concerns\HasViewComponents;
use PreemStudio\Jetpack\Package\Concerns\HasViewComposer;
use PreemStudio\Jetpack\Package\Concerns\HasViews;
use PreemStudio\Jetpack\Package\Concerns\PublishesServiceProvider;
use PreemStudio\Jetpack\Package\Concerns\SharesDataWithAllViews;

final class Package
{
    use HasAssets;
    use HasBasePath;
    use HasCommands;
    use HasConfigFile;
    use HasInstallCommand;
    use HasMigrations;
    use HasName;
    use HasRoutes;
    use HasTranslations;
    use HasViewComponents;
    use HasViewComposer;
    use HasViews;
    use Macroable;
    use PublishesServiceProvider;
    use SharesDataWithAllViews;
}
