@extends('layouts.main')

@section('title', $news->title)

@section('menu')
    @include('menu')
@endsection

@section('content')

    @if (!$news->isPrivate || Auth::check())
    <div class="card mt-3">
        <div class="card-header">{{ $news->title }}</div>
        @if(!is_null($news->image))
            <img src="{{ $news->image }}" alt="news_image">
        @endif
{{--        <div class="card-img"--}}
{{--             style="background-image: url({{ $news->image ??--}}
{{--                                         asset('storage/default.jpg') }})">--}}
{{--        </div>--}}

        <div class="card-body">
            <div class="list-group">
                    <article>
                        <p>{!! $news->text !!}</p>
                    </article>
            </div>
{{--        <a href="{{ route('news.category.show', $category['slug']) }}" class="small float-right">--}}
{{--            Больше новостей из рубрики "{{ $category['name'] }}"--}}
{{--        </a>--}}
        </div>
    </div>
    @else
        <h3>Зарегистрируйтесь, чтобы прочитать новость </h3>
    @endif



@endsection

