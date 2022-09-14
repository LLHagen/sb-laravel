<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArticleCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function build()
    {
        return $this->markdown('articles.mail.article-created', ['article' => $this->article]);
    }
}
