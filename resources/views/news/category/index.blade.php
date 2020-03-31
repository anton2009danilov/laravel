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

        @forelse ($categories as $category)
            <a href="{{ route('news.category.show', $category['slug']) }}">
                <h2>{{ $category['name'] }}</h2>
            </a>
        @empty
            <h3>Нет категорий</h3>
        @endforelse

    </div>
@endsection
