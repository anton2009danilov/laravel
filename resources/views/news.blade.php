@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
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
                <hr>
            @empty
                <h3>Нет новостей</h3>
            @endforelse
        </ul>
    </div>
@endsection
