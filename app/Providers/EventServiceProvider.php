<?php

namespace Steller\Blog\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * @package Steller\Blog\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Steller\Blog\Events\SomeEvent' => [
            'Steller\Blog\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
