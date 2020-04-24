@extends('layouts.main')

@section('title')
    @parent Админка | Категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

            <h1 class="text-center mt-1">Админка | Категории</h1>


            <div class="card">
                <div class="card-body">
                    <div class="list-group">

                        @forelse ($categories as $category)
                            <div class="card mt-1 ">
                                <div class="m-2 d-inline-flex justify-content-around">
                                    <h3>{{ $category->name }}</h3>
                                    <div>
                                        <a href="{{ route('admin.category.edit', $category) }}" class="float-right mr-1">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                        <a href="{{ route('admin.category.destroy', $category) }}" class="float-right mr-1">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                        <a href="{{ route('news.category.show', $category->slug) }}" class="float-right mr-1">
                                            <button type="button" class="btn btn-primary">Show</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>Нет категорий</h3>
                        @endforelse
                        <div class="mt-1">
                            {{ $categories->links() }}
                        </div>

                    </div>
                </div>
            </div>

@endsection
