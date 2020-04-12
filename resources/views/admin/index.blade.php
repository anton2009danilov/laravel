@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

            <h1 class="text-center mt-1">Админка</h1>


    <div class="card mt-3">
        <div class="card-body">
            <div class="list-group">
                @forelse ($news as $item)

                    <div class="list-group-item m-2">
                        <h3>{{ $item->title }}</h3>
                        <a href="{{ route('admin.edit', $item) }}" class="float-right mr-1">
                            <button type="button" class="btn btn-success">Edit</button>
                        </a>
                        <a href="{{ route('admin.destroy', $item) }}" class="float-right mr-1">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                        <a href="{{ route('news.show', $item) }}" class="float-right mr-1">
                            <button type="button" class="btn btn-primary">Show</button>
                        </a>
                    </div>
                @empty
                    <h3>Нет новостей</h3>
                @endforelse
                {{ $news->links() }}
            </div>
        </div>
    </div>

@endsection
