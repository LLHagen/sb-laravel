@component('mail::message')
# Появилась новая статья: {{ $article->title }}

{{ $article->description }}

@component('mail::button', ['url' => route('articles.show', $article)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
