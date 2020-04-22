@extends('layouts.main')

@section('title', $category->name)

@section('menu')
    @include('menu')
@endsection

@section('content')


    <div class="card mt-3">
        <div class="card-body">
            <h1 class="text-center"> {{ $category->name }} </h1>
            <div class="list-group">
                @forelse ($news as $item)

                    <div class="list-group-item m-2">
                        {{ $item->title }}

                        @if (!$item->isPrivate === true)
                            <a href="{{ route('news.show', $item->id) }}" class="float-right small pt-3">
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
