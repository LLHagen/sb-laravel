<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\TagsSynchronizer;

class AdminArticleController extends ArticleController
{
    private $tagsSynchronizer;

    public function __construct(
        TagsSynchronizer $tagsSynchronizer
    )
    {
        parent::__construct($tagsSynchronizer);
    }

    public function index()
    {
        $articles = Article::with('tags')
            ->get()
            ->sortByDesc(function($article){
                return $article->created_at;
            })
        ;

        return view('articles.index', compact('articles'));
    }

    public function articlesPublished(Article $article)
    {
        $article->published = !$article->published;
        $article->save();

        return redirect()->back();
    }
}
