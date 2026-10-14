<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\SchoolData;

use App\Models\SchoolData;
use App\MoonShine\Resources\SchoolData\Pages\SchoolDataDetailPage;
use App\MoonShine\Resources\SchoolData\Pages\SchoolDataFormPage;
use App\MoonShine\Resources\SchoolData\Pages\SchoolDataIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<SchoolData, SchoolDataIndexPage, SchoolDataFormPage, SchoolDataDetailPage>
 */
class SchoolDataResource extends ModelResource
{
    protected string $model = SchoolData::class;

    protected string $title = 'Классы школьников';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            SchoolDataIndexPage::class,
            SchoolDataFormPage::class,
            SchoolDataDetailPage::class,
        ];
    }
}
