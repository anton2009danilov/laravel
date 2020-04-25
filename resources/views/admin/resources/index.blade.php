@extends('layouts.main')

@section('title')
    @parent Админка | RSS-Ресурсы
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <h1 class="text-center mt-1">Админка | RSS-Ресурсы</h1>
    <a href="{{ route('admin.resources.create') }}" class="btn btn-block bg-success text-white">Добавить ресурс</a>

    <div class="card mt-3">
        <div class="card-body">
            <div class="list-group m-1">
                @forelse ($resources as $item)
                    <div class="card">
                        <div class="border-dark p-1 row">
                            <div class="col-sm-9">{{ $item->rss }}</div>
                            <div class="col-sm-3 d-flex align-items-center float-right">
                                <a href="{{ route('admin.resources.destroy', $item) }}">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>

{{--                                <a href="{{ route('news.show', $item) }}">--}}
{{--                                    <button type="button" class="btn btn-primary btn-sm">--}}
{{--                                        <i class="fas fa-glasses"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                            </div>
                        </div>

                    </div>
                @empty
                    <h3>Нет RSS-ресурсов</h3>
                @endforelse
            </div>
        </div>
    </div>

@endsection
