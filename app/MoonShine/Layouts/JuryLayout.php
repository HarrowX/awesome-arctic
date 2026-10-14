<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\ColorManager\ColorManager;
use MoonShine\ColorManager\Palettes\WinterPalette;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;

final class JuryLayout extends MoonShineLayout
{
    protected function menu(): array
    {
        return [];
    }
}
