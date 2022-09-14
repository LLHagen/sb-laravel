<?php

namespace App\Listeners;

use App\Events\ArticleUpdated as EventArticleUpdated;
use App\Mail\ArticleUpdated as MailArticleUpdated;
use Illuminate\Support\Facades\Mail;

class SendArticleUpdatedNotification
{
    public function handle(EventArticleUpdated $event)
    {
        Mail::to(env('MAIL_ADMIN'))->send(new MailArticleUpdated($event->article));
    }
}
