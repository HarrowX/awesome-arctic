<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\ColorManager\Palettes\WinterPalette;
use MoonShine\Contracts\ColorManager\PaletteContract;
use MoonShine\Laravel\Layouts\AppLayout;

class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = WinterPalette::class;

    protected function menu(): array
    {
        return [
            ...parent::menu(),
        ];
    }
}
