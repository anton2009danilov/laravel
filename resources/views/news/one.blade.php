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
            <p>{{ $news['text'] }}</p>
        </article>
    @else
        <h3>Зарегистрируйтесь, чтобы прочитать новость </h3>
    @endif
@endsection

