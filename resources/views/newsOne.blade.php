@include('menu')

<hr>
<a href="{{ route('news.all') }}">Все новости</a>

@foreach ($categories as $category)
    <a href="{{ route('news.category', $category['id']) }}">{{ $category['name'] }}</a>
@endforeach

<hr>

@if (!$news['isPrivate'] === true)
    <article>
        <h3>{{ $news['title'] }}</h3>
        <p>{{ $news['text'] }}</p>
    </article>
@else
    <h3>Зарегистрируйтесь, чтобы прочитать новость </h3>
@endif
