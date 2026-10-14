<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\Crud\Traits\WithComponentsPusher;
use MoonShine\Laravel\MoonShineAuth;
use MoonShine\Laravel\TypeCasts\ModelCaster;
use MoonShine\MenuManager\Attributes\SkipMenu;
use MoonShine\MultiPanels\MultiPanelPage;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Heading;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Components\Title;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\PasswordRepeat;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;

#[SkipMenu]
class ParticipantProfilePage extends MultiPanelPage
{
    protected string $panel = 'participant';

    use WithComponentsPusher;

    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function getTitle(): string
    {
        return 'Профиль участника';
    }

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

            moonshineConfig()->getUserField('username')
                ? Text::make('Почта', moonshineConfig()->getUserField('username'))
                    ->required()
                : null,

            moonshineConfig()->getUserField('avatar')
                ? Image::make('Аватар', moonshineConfig()->getUserField('avatar'))
                    ->disk(moonshineConfig()->getDisk())
                    ->options(moonshineConfig()->getDiskOptions())
                    ->dir(moonshineConfig()->getUserAvatarsDir())
                    ->removable()
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif'])
                : null,
        ]);

        $userPasswordsFields = [
            Heading::make(__('moonshine::ui.resource.change_password')),

            Password::make(__('moonshine::ui.resource.password'), moonshineConfig()->getUserField('password'))
                ->customAttributes(['autocomplete' => 'new-password'])
                ->eye(),

            PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                ->customAttributes(['autocomplete' => 'confirm-password'])
                ->eye(),
        ];

        $contactInfoFields = [Box::make([
            Title::make('TODO'), // TODO
        ])];

        $myEducationFields = [Box::make([
            Title::make('TODO'), // TODO
        ])];

        return [
            Box::make([
                Tabs::make([
                    Tab::make(__('moonshine::ui.resource.main_information'), $userFields),
                    Tab::make(__('moonshine::ui.resource.password'), $userPasswordsFields)->canSee(
                        fn (): bool => $userPasswordsFields !== [],
                    ),
                    Tab::make('Данные представителя', $contactInfoFields),
                    Tab::make('Мое образование', $myEducationFields),
                ]),
            ]),
        ];
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        return [
            $this->getForm(),
            ...$this->getPushedComponents(),
        ];
    }

    public function getForm(): FormBuilderContract
    {
        $user = MoonShineAuth::getGuard()->user() ?? MoonShineAuth::getModel();

        return FormBuilder::make(
            $this->getRouter()->to('profile.store')
        )
            ->async()
            ->name('profile-form')
            ->class('profile-form')
            ->fields($this->fields())
            ->fillCast($user, new ModelCaster($user::class))
            ->submit(__('moonshine::ui.save'), [
                'class' => 'btn-primary btn-lg',
            ]);
    }
}
