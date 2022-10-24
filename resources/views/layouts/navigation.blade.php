<div class="py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{route('articles.list')}}">Главная</a>
        <a class="p-2 text-muted" href="{{route('about')}}">О нас</a>
        <a class="p-2 text-muted" href="{{route('feedback.create')}}">Контакты</a>
        <a class="p-2 text-muted" href="{{route('articles.create')}}">Создать статью</a>
        @isAdmin()
            <div class="dropdown show p-2 text-muted">
                <a class="dropdown-toggle p-2 text-muted" href="#" data-toggle="dropdown" >Админ. раздел</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item btn btn-sm btn-outline-secondary" href="{{route('admin.feedback.index')}}">
                        Заявки
                    </a>
                    <a class="dropdown-item btn btn-sm btn-outline-secondary" href="{{route('admin.articles.index')}}">
                        Статьи
                    </a>
                </div>
            </div>
        @endIsAdmin()
    </nav>
</div>
