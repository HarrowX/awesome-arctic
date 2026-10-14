<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Participant\Pages;

use App\MoonShine\Resources\Participant\ParticipantResource;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Components\Title;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use Throwable;

/**
 * @extends FormPage<ParticipantResource>
 */
class ParticipantFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $userFields = array_filter([
            ID::make(),

            Box::make([
                Text::make('Имя', 'name')
                    ->required(),
                Text::make('Фамилия', 'surname')
                    ->required(),
                Text::make('Отчество', 'patronymic'),
            ]),

            Select::make('Пол', 'gender')
                ->placeholder('Не указан')
                ->nullable()
                ->options([
                    'male' => 'Мужской',
                    'female' => 'Женский',
                ]),

            File::make('Соглашение на обработку данных', 'agreement'),

            Text::make('Почта', 'email')->required(),

            Image::make('Аватар', 'avatar')
                ->disk(moonshineConfig()->getDisk())
                ->options(moonshineConfig()->getDiskOptions())
                ->dir(moonshineConfig()->getUserAvatarsDir())
                ->removable()
                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),
        ]);

        $contactInfoFields = [Box::make([
            Title::make('TODO'), // TODO
        ])];

        $educationFields = [Box::make([
            Title::make('TODO'), // TODO
        ])];

        return [
            Box::make([
                Tabs::make([
                    Tab::make(__('moonshine::ui.resource.main_information'), $userFields),
                    Tab::make('Данные представителя', $contactInfoFields),
                    Tab::make('Образование', $educationFields),
                ]),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer(),
        ];
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer(),
        ];
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer(),
        ];
    }
}
