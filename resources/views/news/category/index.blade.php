@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse ($categories as $category)
                    <div class="card m-5">
                        <div class="card-body">
                            <a href="{{ route('news.category.show', $category['slug']) }}">
                                <h2>{{ $category['name'] }}</h2>
                            </a>
                        </div>
                    </div>
                @empty
                    <h3>Нет категорий</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
