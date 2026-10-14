<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Pages\ParticipantProfilePage;
use MoonShine\MenuManager\MenuItem;

final class ParticipantLayout extends MoonShineLayout
{
    protected function menu(): array
    {
        return [
            MenuItem::make(app(ParticipantProfilePage::class)->getUrl(), 'Мой профиль'),
        ];
    }
}
