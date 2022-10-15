@component('mail::message')
# Статья удалена: {{ $article->title }}

{{ $article->description }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
