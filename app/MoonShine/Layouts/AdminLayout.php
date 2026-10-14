<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\Participant\ParticipantResource;
use App\MoonShine\Resources\Region\RegionResource;
use App\MoonShine\Resources\School\SchoolResource;
use MoonShine\Laravel\Resources\MoonShineUserResource;
use MoonShine\Laravel\Resources\MoonShineUserRoleResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

final class AdminLayout extends MoonShineLayout
{
    protected function menu(): array
    {
        return [
            MenuGroup::make('Системные', [
                MenuItem::make(MoonShineUserResource::class),
                MenuItem::make(MoonShineUserRoleResource::class),
            ]),

            MenuGroup::make('Места', [
                MenuItem::make(RegionResource::class, 'Регионы'),
                MenuItem::make(SchoolResource::class, 'Школы'),
            ]),

            MenuItem::make(ParticipantResource::class, 'Школьники'),
        ];
    }
}
