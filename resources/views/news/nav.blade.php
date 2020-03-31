@foreach ($categories as $category)
    <a href="{{ route('news.category', $category['slug']) }}">{{ $category['name'] }}</a>
@endforeach
