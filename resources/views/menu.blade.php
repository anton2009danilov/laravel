<ul class="nav bg-secondary">
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('Home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('news.index') }}">Новости</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('news.category.index') }}">Категории</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('admin.index', null, false) }}">Админка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('vue') }}">Vue</a>
    </li>
</ul>
