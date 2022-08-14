<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|unique:articles',
            'slug' => 'required|unique:articles',
            'preview' => 'required',
            'description' => 'required',
        ]);

        $attributes['published'] = $request->input('published') ? 1 : 0;

        Article::create($attributes);

        return back();
    }
}
