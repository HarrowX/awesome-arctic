<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Region;

use App\Models\Region;
use App\MoonShine\Resources\Region\Pages\RegionDetailPage;
use App\MoonShine\Resources\Region\Pages\RegionFormPage;
use App\MoonShine\Resources\Region\Pages\RegionIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<Region, RegionIndexPage, RegionFormPage, RegionDetailPage>
 */
class RegionResource extends ModelResource
{
    protected string $model = Region::class;

    protected string $title = 'Регионы';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            RegionIndexPage::class,
            RegionFormPage::class,
            RegionDetailPage::class,
        ];
    }
}
