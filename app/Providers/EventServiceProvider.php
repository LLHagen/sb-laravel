<?php

namespace App\Providers;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleDeletedNotification;
use App\Listeners\SendArticleUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleDeleted::class => [
            SendArticleDeletedNotification::class,
        ],
        ArticleUpdated::class => [
            SendArticleUpdatedNotification::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
