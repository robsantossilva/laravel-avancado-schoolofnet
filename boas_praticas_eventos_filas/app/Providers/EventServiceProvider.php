<?php

namespace App\Providers;

use App\Events\OrderProductsSaveCompleted;
use App\Events\ProductUpdated;
use App\Events\StockEntryCreated;
use App\Events\StockOutputCreated;
use App\Listeners\CalculateTotalOrderListener;
use App\Listeners\CheckStockMaxListener;
use App\Listeners\CheckStockMinListener;
use App\Listeners\DecrementStockListener;
use App\Listeners\IncrementStockListener;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\UserObserver;

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
            IncrementStockListener::class,
        ],
        ProductUpdated::class => [
            CheckStockMaxListener::class,
            CheckStockMinListener::class,
        ],
        StockOutputCreated::class => [
            DecrementStockListener::class,
        ],
        OrderProductsSaveCompleted::class => [
            CalculateTotalOrderListener::class
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
