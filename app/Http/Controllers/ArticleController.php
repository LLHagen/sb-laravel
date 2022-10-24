<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;

class ArticleController extends Controller
{
    private $tagsSynchronizer;

    public function __construct(
        TagsSynchronizer $tagsSynchronizer
    )
    {
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->middleware('auth', ['only' => ['store','create']]);
        $this->middleware(['can:view,article'], ['only' => ['show']]);
        $this->middleware('can:change,article', ['only' => ['edit','update','destroy']]);
    }

    public function index()
    {
        $articles = Article::with('tags')
            ->where('published','=', true)
            ->get()
            ->sortByDesc(function($article){
                return $article->created_at;
            })
        ;

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

    public function store(ArticleFormRequest $request)
    {
        $params = $request->validated();

        $params['published'] =  $request->get('published', false) == 1;

        $params['owner_id'] = auth()->user()->id;

        $article = Article::create($params);

        $tags = collect(explode(',', $request->get('tags' , '')));

        $this->tagsSynchronizer->sync($tags, $article);

        return back()->with('created', !empty($article));;
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

        $tags = collect(explode(',', $request->get('tags' , '')));

        $this->tagsSynchronizer->sync($tags, $article);

        return redirect(route('articles.show', $article))->with('updated', true);
    }

    public function destroy(Article $article)
    {
        $isDeleted = $article->delete();

        return redirect(route('articles.list'))->with('deleted', $isDeleted);
    }
}
