<?php

namespace App\Providers;

use App\Events\StockEntryCreated;
use App\Listeners\IncrementStockListener;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\UserObserver;
use App\StockEntry;

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
        StockEntryCreated::class => [
            IncrementStockListener::class
        ],
        'App\Events\ProductUpdating' => [
            'App\Listeners\CheckStockMaxListener'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::observe(UserObserver::class);
    }
}
