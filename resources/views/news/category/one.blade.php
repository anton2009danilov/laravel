@include('menu')

<h1> {{ $category['name'] }} </h1>

    <hr>

<div>
    <ul>
        @foreach ($news as $item)
                <li>
                    <a href=" {{ route('news.show', $item['id']) }} "> {{ $item['title'] }} </a>
                </li>
        @endforeach
    </ul>
</div>
