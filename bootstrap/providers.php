<?php

use App\Providers\AppServiceProvider;
use App\Providers\MoonShineServiceProvider;
use MoonShine\MultiPanels\Providers\MultiPanelServiceProvider;

return [
    AppServiceProvider::class,
    MoonShineServiceProvider::class,
    MultiPanelServiceProvider::class,
];
