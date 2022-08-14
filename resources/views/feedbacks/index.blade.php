@extends('layouts.layout')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Заявки
                </h3>

                @foreach($feedbacks as $feedback)
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$feedback->email}}</h2>
                        <p class="blog-post-meta">{{$feedback->created_at}}</p>
                        <p>{{$feedback->message}}</p>
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
