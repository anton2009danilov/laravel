@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="list-group">
                            @forelse ($news as $item)

                                <div class="list-group-item m-2">
                                    {{ $item['title'] }}
                                    <div class="card-img" style="background-image: url({{ $item['image'] }})"></div>
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

@endsection
