<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Participant;

use App\Models\Participant;
use App\MoonShine\Resources\Participant\Pages\ParticipantDetailPage;
use App\MoonShine\Resources\Participant\Pages\ParticipantFormPage;
use App\MoonShine\Resources\Participant\Pages\ParticipantIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<Participant, ParticipantIndexPage, ParticipantFormPage, ParticipantDetailPage>
 */
class ParticipantResource extends ModelResource
{
    protected string $model = Participant::class;

    protected string $title = 'Школьники';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ParticipantIndexPage::class,
            ParticipantFormPage::class,
            ParticipantDetailPage::class,
        ];
    }
}
