
@include('menu')

<h1> {{ $category['name'] }} </h1>

    <hr>
    <a href="{{ route('news.all') }}">Все новости</a>

    @foreach ($categories as $item)
        <a href=" {{ route('news.category', $item['id']) }} "> {{ $item['name'] }}</a>
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
