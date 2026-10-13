<?php

declare(strict_types=1);

use App\Models\Jury;
use App\Models\Participant;
use App\Models\Tutor;
use App\MoonShine\Layouts\AdminLayout;
use App\MoonShine\Layouts\JuryLayout;
use App\MoonShine\Layouts\MoonShineLayout;
use App\MoonShine\Layouts\ParticipantLayout;
use App\MoonShine\Layouts\TutorLayout;
use App\MoonShine\Pages\AdminDashboard;
use App\MoonShine\Pages\Dashboard;
use App\MoonShine\Pages\JuryDashboard;
use App\MoonShine\Pages\ParticipantDashboard;
use App\MoonShine\Pages\TutorDashboard;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use MoonShine\ColorManager\Palettes\WinterPalette;
use MoonShine\Crud\Forms\FiltersForm;
use MoonShine\Crud\Forms\LoginForm;
use MoonShine\Laravel\Exceptions\MoonShineNotFoundException;
use MoonShine\Laravel\Http\Middleware\Authenticate;
use MoonShine\Laravel\Http\Middleware\ChangeLocale;
use MoonShine\Laravel\Models\MoonshineUser;
use MoonShine\Laravel\Pages\ErrorPage;
use MoonShine\Laravel\Pages\LoginPage;
use MoonShine\Laravel\Pages\ProfilePage;
use MoonShine\MultiPanels\Http\Middleware\MultiPanelMiddleware;

return [
    'title' => env('MOONSHINE_TITLE', 'MoonShine'),
    'logo' => '/vendor/moonshine/logo-small.svg',
    'logo_small' => '/vendor/moonshine/logo-small.svg',

    'favicons' => [
        'apple-touch' => '/vendor/moonshine/apple-touch-icon.png',
        '32' => '/vendor/moonshine/favicon-32x32.png',
        '16' => '/vendor/moonshine/favicon-16x16.png',
        'safari-pinned-tab' => '/vendor/moonshine/safari-pinned-tab.svg',
    ],

    // Default flags
    'use_migrations' => true,
    'use_notifications' => true,
    'use_database_notifications' => true,
    'use_routes' => false,
    'use_profile' => true,

    // Routing
    'domain' => env('MOONSHINE_DOMAIN'),
    'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'admin'),
    'page_prefix' => env('MOONSHINE_PAGE_PREFIX', 'page'),
    'resource_prefix' => env('MOONSHINE_RESOURCE_PREFIX', 'resource'),
    'home_route' => 'moonshine.index',

    // Error handling
    'not_found_exception' => MoonShineNotFoundException::class,

    // Middleware
    'middleware' => [
        ConvertEmptyStringsToNull::class,
        EncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        AuthenticateSession::class,
        ShareErrorsFromSession::class,
        VerifyCsrfToken::class,
        SubstituteBindings::class,
        ChangeLocale::class,
        MultiPanelMiddleware::class,
    ],

    // Storage
    'disk' => 'public',
    'disk_options' => [],
    'cache' => 'file',

    // Authentication and profile
    'auth' => [
        'enabled' => true,
        'guard' => 'moonshine',
        'model' => MoonshineUser::class,
        'middleware' => [
            Authenticate::class,
        ],
        'pipelines' => [],
    ],

    // Authentication and profile
    'user_fields' => [
        'username' => 'email',
        'password' => 'password',
        'name' => 'name',
        'avatar' => 'avatar',
    ],

    // Layout, palette, pages, forms
    //    'layout' => MoonShineLayout::class,
    'palette' => WinterPalette::class,

    'forms' => [
        'login' => LoginForm::class,
        'filters' => FiltersForm::class,
    ],

    //    'pages' => [
    //        'dashboard' => Dashboard::class,
    //        'profile' => ProfilePage::class,
    //        'login' => LoginPage::class,
    //        'error' => ErrorPage::class,
    //    ],

    // Localizations
    'locale' => 'en',
    'locale_key' => ChangeLocale::KEY,
    'locales' => [
        // en
    ],

    'panels' => [
        'admin' => [
            'prefix' => 'admin',
            'layout' => AdminLayout::class,

            'auth' => [
                'enabled' => true,
                'guard' => 'moonshine',
                'model' => MoonshineUser::class,
                'middleware' => [
                    MultiPanelMiddleware::class,
                    Authenticate::class,
                ],
                'pipelines' => [],
            ],

            'pages' => [
                'dashboard' => AdminDashboard::class,
                'profile' => ProfilePage::class, // TODO ПОМЕНЯТЬ ВСЕ
                'login' => LoginPage::class,
                'error' => ErrorPage::class,
            ],

            'middleware' => [
                MultiPanelMiddleware::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                ChangeLocale::class,
            ],
        ],

        'participant' => [
            'prefix' => 'participant',
            'layout' => ParticipantLayout::class,

            'pages' => [
                'dashboard' => ParticipantDashboard::class,
                'profile' => ProfilePage::class, // TODO ПОМЕНЯТЬ ВСЕ
                'login' => LoginPage::class,
                'error' => ErrorPage::class,
            ],

            'auth' => [
                'enabled' => true,
                'guard' => 'moonshine-participant',
                'model' => Participant::class,
                'middleware' => [
                    MultiPanelMiddleware::class,
                    Authenticate::class,
                ],
                'pipelines' => [],
            ],

            'middleware' => [
                MultiPanelMiddleware::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                ChangeLocale::class,
            ],
        ],

        'tutor' => [
            'prefix' => 'tutor',
            'layout' => TutorLayout::class,

            'pages' => [
                'dashboard' => TutorDashboard::class,
                'profile' => ProfilePage::class, // TODO ПОМЕНЯТЬ ВСЕ
                'login' => LoginPage::class,
                'error' => ErrorPage::class,
            ],

            'auth' => [
                'enabled' => true,
                'guard' => 'moonshine-tutor',
                'model' => Tutor::class,
                'middleware' => [
                    MultiPanelMiddleware::class,
                    Authenticate::class,
                ],
                'pipelines' => [],
            ],

            'middleware' => [
                MultiPanelMiddleware::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                ChangeLocale::class,
            ],
        ],

        'jury' => [
            'prefix' => 'jury',
            'layout' => JuryLayout::class,

            'pages' => [
                'dashboard' => JuryDashboard::class,
                'profile' => ProfilePage::class, // TODO ПОМЕНЯТЬ ВСЕ
                'login' => LoginPage::class,
                'error' => ErrorPage::class,
            ],

            'auth' => [
                'enabled' => true,
                'guard' => 'moonshine-jury',
                'model' => Jury::class,
                'middleware' => [
                    MultiPanelMiddleware::class,
                    Authenticate::class,
                ],
                'pipelines' => [],
            ],

            'middleware' => [
                MultiPanelMiddleware::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                ChangeLocale::class,
            ],
        ],
    ],
];
