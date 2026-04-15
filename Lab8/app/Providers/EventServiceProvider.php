<?php

namespace App\Providers;

use App\Events\ProductCreated;
use App\Listeners\LogProductCreation;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        ProductCreated::class => [
            LogProductCreation::class,
        ],
    ];

    public function boot(): void
    {
    }
}
