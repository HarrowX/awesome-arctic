<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\School;

use App\Models\School;
use App\MoonShine\Resources\School\Pages\SchoolDetailPage;
use App\MoonShine\Resources\School\Pages\SchoolFormPage;
use App\MoonShine\Resources\School\Pages\SchoolIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<School, SchoolIndexPage, SchoolFormPage, SchoolDetailPage>
 */
class SchoolResource extends ModelResource
{
    protected string $model = School::class;

    protected string $title = 'Школы';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            SchoolIndexPage::class,
            SchoolFormPage::class,
            SchoolDetailPage::class,
        ];
    }
}
