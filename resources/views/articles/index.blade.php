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
            <h2 class="blog-post-title"><a href="/articles/{{$article->slug}}">{{$article->title}}</a></h2>
            <p class="blog-post-meta">{{$article->created_at}}<!--<a href="#">Chris</a>--></p>
            @include('articles.tags', ['tags' => $article->tags])
            <p>{{$article->preview}}</p>
        </div><!-- /.blog-post -->
    @endforeach

@endsection
