@extends('layouts.layout')

@section('content')

    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Контакты
    </h3>

    <form method="post" action="{{route('articles.store')}}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <input type="text" class="form-control" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
