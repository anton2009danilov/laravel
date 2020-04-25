@extends('layouts.main')

@section('title', 'Категории новостей')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse ($categories as $category)
        <div class="d-inline-flex m-1">
            <a class="text-white btn bg-info" href="{{ route('news.category.show', $category->slug) }}">{{ $category->name }}</a>
        </div>
    @empty
        <h3>Нет категорий</h3>
    @endforelse
    <div class="mt-1">
        {{ $categories->links() }}
    </div>
@endsection
