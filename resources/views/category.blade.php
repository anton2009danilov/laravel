@dump(\App\Category::getCategoryIdBySlug('hot'))
@include('menu')

<h1> {{ $category['name'] }} </h1>

    <hr>
    <a href="{{ route('news.all') }}">Все новости</a>

    @foreach ($categories as $category)
        <a href=" {{ route('news.category', $category['id']) }} "> {{ $category['name'] }}</a>
    @endforeach

<!--    <hr>-->
<div>
    <ul>
        @foreach ($news as $item)
                <li>
                    <a href=" {{ route('news.one', $item['id']) }} "> {{ $item['title'] }} </a>
                </li>
        @endforeach
    </ul>
</div>
