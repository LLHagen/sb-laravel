<?php

namespace App\Listeners;

use App\Events\ArticleDeleted as EventArticleDeleted;
use App\Mail\ArticleDeleted as MailArticleDeleted;
use Illuminate\Support\Facades\Mail;

class SendArticleDeletedNotification
{
    public function handle(EventArticleDeleted $event)
    {
        Mail::to(env('MAIL_ADMIN'))->send(new MailArticleDeleted($event->article));
    }
}
