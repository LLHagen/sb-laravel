<?php

namespace App\Listeners;

use App\Events\ArticleCreated as EventArticleCreated;
use App\Mail\ArticleCreated as MailArticleCreated;
use Illuminate\Support\Facades\Mail;

class SendArticleCreatedNotification
{
    public function handle(EventArticleCreated $event)
    {
        Mail::to(config('mail.to.admin.address'))->send(new MailArticleCreated($event->article));
    }
}
