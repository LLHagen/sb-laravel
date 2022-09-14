@component('mail::message')
# Статья обновлена: {{ $article->title }}

{{ $article->description }}

@component('mail::button', ['url' => route('articles.show', $article)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
