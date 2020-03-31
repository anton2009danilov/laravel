@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card m-5">
{{--                    <div class="card-header">Список новостей</div>--}}

                    <div class="card-body">
                        <div class="list-group">
                            @forelse ($news as $item)

                                <div class="list-group-item m-2">
                                    {{ $item['title'] }}
{{--                                    <div class="">{{ $item['title'] }}</div>--}}

                                    @if (!$item['isPrivate'] === true)
                                    <a href="{{ route('news.show', $item['id']) }}" class="float-right small pt-3">
                                        Подробнее...
                                    </a>

                                    @endif
                                </div>
                                    @empty
                                    <h3>Нет новостей</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
