@extends('layouts.layout')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{$article->title}}
                </h3>

                <div class="blog-post">
                    <p class="blog-post-meta">{{$article->created_at}}<!--<a href="#">Chris</a>--></p>

                    <p>{{$article->description}}</p>
                </div><!-- /.blog-post -->


                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="/">Назад</a>
                </nav>

            </div><!-- /.blog-main -->

            @include('layouts.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
