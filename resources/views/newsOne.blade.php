@include('menu')

<hr>
<a href="{{ route('news.all') }}">Все новости</a>

@foreach ($categories as $category)
    <a href="{{ route('news.category', $category['id']) }}">{{ $category['name'] }}</a>
@endforeach

<hr>

<article>
    <h3>{{ $news['title'] }}</h3>
    <p>{{ $news['text'] }}</p>
</article>
