@include('menu')

<div>
    <hr>
    <a href="{{ route('news.all') }}">Все новости</a>

    @include('news.nav')

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

