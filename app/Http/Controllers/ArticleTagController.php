<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleTagController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()
            ->where('published','=', true)
            ->with('tags')
            ->get();

        return view('articles.index', compact('articles'));
    }
}
