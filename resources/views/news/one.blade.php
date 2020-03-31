@extends('layouts.main')

@section('title')
    @parent {{ $news['title'] }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news['isPrivate'] === true)
        <article>
            <h3>{{ $news['title'] }}</h3>
            <a href="{{ route('news.category.show', $category['slug']) }}">
                <h5>Больше новостей из рубрики "{{ $category['name'] }}"</h5>
            </a>
            <p>{{ $news['text'] }}</p>
        </article>
    @else
        <h3>Зарегистрируйтесь, чтобы прочитать новость </h3>
    @endif
@endsection

