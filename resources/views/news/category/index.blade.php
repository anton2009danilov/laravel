@extends('layouts.main')

@section('title', 'Категории новостей')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse ($categories as $category)
        <div class="d-inline-flex mt-2">
            <div class="card bg-info p-1">
                <a class="text-white btn" href="{{ route('news.category.show', $category->slug) }}">{{ $category->name }}</a>
            </div>
        </div>
    @empty
        <h3>Нет категорий</h3>
    @endforelse
    <div class="mt-1">
        {{ $categories->links() }}
    </div>
@endsection
