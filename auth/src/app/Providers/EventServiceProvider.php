<?php

namespace App\Providers;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Observers\FixtureObserver;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Http\Championships\Events\FixtureUpdated;
use App\Http\Championships\Listeners\ValidateMatchWinners;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FixtureUpdated::class => [
            ValidateMatchWinners::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Fixture::observe(FixtureObserver::class);
    }
}
