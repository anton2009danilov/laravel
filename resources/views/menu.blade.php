<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('Home')?'active':'' }}"
       href="{{ route('Home') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->routeIs('news.index')?'active':'' }}"
       href="{{ route('news.index') }}">Новости</a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->routeIs('news.category.index')?'active':'' }}"
       href="{{ route('news.category.index') }}">Категории</a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->routeIs('admin.index')?'active':'' }}"
       href="{{ route('admin.news.index', null, false) }}">Админка</a>
</li>

{{--<li class="nav-item">--}}
{{--    <a class="nav-link  {{ request()->routeIs('vue')?'active':'' }}" href="{{ route('vue') }}">Vue</a>--}}
{{--</li>--}}
