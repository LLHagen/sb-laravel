@extends('layouts.layout')

@section('content')

    @if (request()->session()->get('deleted') === true)
        <x-alerts.success text="Статья удалена!" />
    @endif

    <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>

    @foreach($articles as $article)
        <div class="blog-post">

            <div class="border-bottom">
                <div class="d-flex justify-content-between">
                    @isAdmin
                    <h2 class="blog-post-title"><a href="{{route('admin.articles.show', $article)}}">{{$article->title}}</a></h2>
                    @elseIsAdmin
                    <h2 class="blog-post-title"><a href="{{route('articles.show', $article)}}">{{$article->title}}</a></h2>
                    @endIsAdmin
                    @if (!empty($user = auth()->user()) && $user->isAdmin())
                        <div class="form-check mr-2 mt-3">
                            <form action="{{route('admin.articles.published', $article)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="published"
                                    value="1"
                                    id="{{$article->slug}}"
                                    onclick="this.form.submit()"
                                    @if(old('published') || (isset($article->published) && $article->published))
                                    checked
                                    @endif
                                >
                                <label class="form-check-label" for="{{$article->slug}}">
                                    Опубликовано
                                </label>
                            </form>
                        </div>
                    @endif
                </div>
            </div>


            <p class="blog-post-meta">{{$article->created_at}}<!--<a href="#">Chris</a>--></p>
            @include('articles.tags', ['tags' => $article->tags])
            <p>{{$article->preview}}</p>
        </div><!-- /.blog-post -->
    @endforeach

@endsection
