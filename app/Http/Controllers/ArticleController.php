<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->where('published','=', true)->sortDesc();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleFormRequest $request, Article $article)
    {
        $params = $request->validated();

        $params["published"] =  $request->get('published', false) == 1;

        $article->update($params);

        return redirect(route('articles.show', $article))->with('updated', true);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function store(ArticleFormRequest $request)
    {
        $params = $request->validated();

        $params["published"] =  $request->get('published', false) == 1;

        $article = Article::create($params);

        return back()->with('created', !empty($article));;
    }

    public function destroy(Article $article)
    {
        $isDeleted = $article->delete();

        return redirect(route('articles.list'))->with('deleted', $isDeleted);
    }
}
