<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Layouts\MoonShineLayout;
use App\MoonShine\Pages\AdminDashboard;
use App\MoonShine\Pages\JuryDashboard;
use App\MoonShine\Pages\ParticipantDashboard;
use App\MoonShine\Pages\ParticipantProfilePage;
use App\MoonShine\Pages\TutorDashboard;
use App\MoonShine\Resources\MoonShineUser\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRole\MoonShineUserRoleResource;
use App\MoonShine\Resources\Participant\ParticipantResource;
use App\MoonShine\Resources\Region\RegionResource;
use App\MoonShine\Resources\School\SchoolResource;
use App\MoonShine\Resources\SchoolData\SchoolDataResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  CoreContract<MoonShineConfigurator>  $core
     */
    public function boot(CoreContract $core): void
    {
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                RegionResource::class,
                SchoolResource::class,
                SchoolDataResource::class,
                ParticipantResource::class,
            ])
            ->pages([
                ...$core->getConfig()->getPages(),

                ParticipantProfilePage::class,

                AdminDashboard::class,
                JuryDashboard::class,
                ParticipantDashboard::class,
                TutorDashboard::class,
            ]);
        moonshineConfig()->layout(MoonShineLayout::class);
    }
}
