<?php

namespace App\Listeners;

use App\Events\ArticleUpdated as EventArticleUpdated;
use App\Mail\ArticleUpdated as MailArticleUpdated;
use Illuminate\Support\Facades\Mail;

class SendArticleUpdatedNotification
{
    public function handle(EventArticleUpdated $event)
    {
        Mail::to(config('mail.to.admin.address'))->send(new MailArticleUpdated($event->article));
    }
}
