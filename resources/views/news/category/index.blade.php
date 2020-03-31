@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <h1>Новости по категориям</h1>
        <hr>

        @foreach ($categories as $category)
            <a href="{{ route('news.category.show', $category['slug']) }}">{{ $category['name'] }}</a>
        @endforeach

        <hr>
{{--        <ul>--}}
{{--            @forelse ($news as $item)--}}
{{--                <h3>{{ $item['title'] }}</h3>--}}

{{--                @if (!$item['isPrivate'] === true)--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('news.show', $item['id']) }}">Подробнее...</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--                <hr>--}}
{{--            @empty--}}
{{--                <h3>Нет новостей</h3>--}}
{{--            @endforelse--}}
{{--        </ul>--}}
    </div>
@endsection
