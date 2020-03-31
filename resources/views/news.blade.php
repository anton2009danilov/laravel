@include('menu')

<div>
    <hr>
    <a href="{{ route('news.all') }}">Все новости</a>

    @foreach ($categories as $category)
        <a href="{{ route('news.category', $category['id']) }}">{{ $category['name'] }}</a>
    @endforeach

    <hr>
    <ul>
        @forelse ($news as $item)
            <h3>{{ $item['title'] }}</h3>

            @if (!$item['isPrivate'] === true)
                <li>
                    <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a>
                </li>
            @endif
        @empty
            <h3>Нет новостей</h3>
        @endforelse
    </ul>
</div>

