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
                        {{ $item->title }}
                        <a href="{{ route('admin.update', $item) }}">
                            <button type="button" class="btn btn-success">Edit</button>
                        </a>
                        <a href="{{ route('admin.destroy', $item) }}">
                            <button type="button" class="btn btn-danger">Delete</button>
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
