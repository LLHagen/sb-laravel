@extends('layouts.layout')

@section('content')

    @if (request()->session()->get('updated') === true)
        <x-alerts.success text="Изменения успешно сохранены!" />
    @endif

    <div class="p-0 m-0">

        {{--        title       --}}
        <div class="border-bottom">
            <div class="d-flex justify-content-between">
                <h3 class="pb-3 mb-2 font-italic mr-auto">
                    {{$article->title}}
                </h3>
                @if (!empty($user = auth()->user()) && $user->can('change', $article))
                    <nav class="blog-pagination mr-2 mt-2">
                        <a class="btn btn-outline-primary" href="{{route('articles.edit', $article)}}">Редактировать</a>
                    </nav>
                    <form class="mt-2" method="POST" action="{{ route('articles.destroy', $article) }}">
                        @csrf
                        @method('delete')
                        <nav class="blog-pagination">
                            <input type="submit" class="btn btn-outline-danger" value="Удалить">
                        </nav>
                    </form>
                @endif

            </div>
        </div>

        <div class="blog-post p-3 mb-3 rounded">
            @include('articles.tags', ['tags' => $article->tags])
            <p class="blog-post-meta">{{$article->created_at}}<!--<a href="#">Chris</a>--></p>

            <p class="mb-0">{{$article->description}}</p>
        </div><!-- /.blog-post -->

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/">Назад</a>
        </nav>
    </div>

@endsection
