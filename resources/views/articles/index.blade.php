@extends('layouts.layout')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>

                @foreach($articles as $article)
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a href="/articles/{{$article->slug}}">{{$article->title}}</a></h2>
                        <p class="blog-post-meta">{{$article->created_at}}<!--<a href="#">Chris</a>--></p>

                        <p>{{$article->preview}}</p>
                    </div><!-- /.blog-post -->
                @endforeach

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            @include('layouts.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
