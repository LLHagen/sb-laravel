@extends('layouts.layout')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Создать статью
                </h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{route('articles.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Символьный код</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="preview" class="form-label">Краткое описание статьи</label>
                        <input type="text" class="form-control" name="preview">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Детальное описание</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="published">
                        <label class="form-check-label" for="published">Опубликовано</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div><!-- /.blog-main -->

            @include('layouts.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
