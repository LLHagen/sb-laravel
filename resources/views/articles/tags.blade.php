@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags ?? collect() as $tag)
        <a href="{{ route('articles.tags', $tag) }}" class="badge badge-secondary">{{$tag->name}}</a>
    @endforeach
@endif
