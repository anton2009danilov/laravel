@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

            <h1 class="text-center mt-1">Админка | Категории</h1>


            @forelse ($categories as $category)
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>{{ $category->name }}</h2>
                        <a href="{{ route('news.category.show', $category->slug) }}" class="float-right mr-1">
                            <button type="button" class="btn btn-primary">Show</button>
                        </a>
                    </div>
                </div>
            @empty
                <h3>Нет категорий</h3>
            @endforelse
            {{ $categories->links() }}

@endsection
