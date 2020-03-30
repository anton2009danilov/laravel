@include('menu')

<div>
    <hr>
    <a href="{{ route('news.all') }}">Все новости</a>

    @foreach ($categories as $category)
        <a href="{{ route('news.category', $category['id']) }}">{{ $category['name'] }}</a>
    @endforeach

    <hr>
    <ul>
        @foreach ($news as $item)
        <li>
            <a href="{{ route('news.one', $item['id']) }}">{{ $item['title'] }}</a>
        </li>
        @endforeach
    </ul>
</div>

