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
                        {{ $item->title }}
                        <div class="card-img"
                             style="background-image: url({{ $item->image ??
                                         asset('storage/default.jpg') }})">
                        </div>
                        @if (!$item->isPrivate || Auth::check())
                            <a href="{{ route('news.show', $item) }}" class="float-right small pt-3">
                                Подробнее...
                            </a>
                        @else
                            <small class="float-right pt-3">Зарегистрируйтесь, чтобы прочитать новость</small>
                        @endif
                    </div>
                @empty
                    <h3>Нет новостей</h3>
                @endforelse
                {{ $news->links() }}
            </div>
        </div>
    </div>

@endsection
