@extends('layouts.main')

@section('title')
    @parent Админка | Новости
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

            <h1 class="text-center mt-1">Админка | Новости</h1>


    <div class="card mt-3">
        <div class="card-body">
            <div class="list-group m-1">
                @forelse ($news as $item)
                    <div class="card">
                        <div class="border-dark p-1 row">
                            <div class="col-sm-9">{{ $item->title }}</div>
                            <div class="col-sm-3 d-flex align-items-center float-right">
                                <a href="{{ route('admin.news.edit', $item) }}" class="">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{ route('admin.news.destroy', $item) }}" class="">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>

                                <a href="{{ route('news.show', $item) }}" class="">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-glasses"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    <h3>Нет новостей</h3>
                @endforelse
                {{ $news->links() }}
            </div>
        </div>
    </div>

@endsection
