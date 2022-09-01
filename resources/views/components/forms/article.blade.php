<form method="post" action="{{ $action }}">
    @csrf
    @method($method ?? 'POST')
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input
            type="text"
            class="form-control"
            name="title"
            value="{{ old('title') ?? $article->title ?? ''}}"
        >
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Символьный код</label>
        <input
            type="text"
            class="form-control"
            name="slug"
            value="{{ old('slug') ?? $article->slug ?? ''}}"
        >
    </div>
    <div class="mb-3">
        <label for="preview" class="form-label">Краткое описание статьи</label>
        <input
            type="text"
            class="form-control"
            name="preview"
            value="{{ old('preview') ?? $article->preview ?? ''}}"
        >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Детальное описание</label>
        <input
            type="text"
            class="form-control"
            name="description"
            value="{{ old('description') ?? $article->description ?? ''}}"
        >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Tags</label>
        <input
            type="text"
            class="form-control"
            name="tags"
            value="{{ isset($article) ? $article->tags->pluck('name')->implode(',') : '' }}"
        >
    </div>
    <div class="mb-3 form-check">
        <input
            type="checkbox"
            class="form-check-input"
            name="published"
            value="1"
            @if(old('published') || (isset($article->published) && $article->published))
            checked
            @endif
        >
        <label class="form-check-label" for="published">Опубликовано</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
