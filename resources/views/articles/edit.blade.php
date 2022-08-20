@extends('layouts.layout')

@section('content')

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

    <x-forms.article
        action="{{route('articles.update', $article)}}"
        method="PATCH"
        :article="$article"
    />

@endsection
