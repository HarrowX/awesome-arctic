<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Participant;

use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;
use App\MoonShine\Resources\Participant\Pages\ParticipantIndexPage;
use App\MoonShine\Resources\Participant\Pages\ParticipantFormPage;
use App\MoonShine\Resources\Participant\Pages\ParticipantDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

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
