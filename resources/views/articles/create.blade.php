@extends('layouts.layout')

@section('content')

    @if (request()->session()->get('created') === true)
        <x-alerts.success text="Статья создана!"/>
    @endif

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

    </form>
    <x-forms.article
        action="{{route('articles.store')}}"
        method="post"
    />
@endsection
