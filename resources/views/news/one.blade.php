@extends('layouts.main')

@section('title')
    @parent {{ $news['title'] }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (!$news['isPrivate'] === true)
                <div class="card m-5">
                    <div class="card-header">{{ $news['title'] }}</div>
                    <div class="card-body">
                        <div class="list-group">
                                <article>
                                    <p>{{ $news['text'] }}</p>
                                </article>
                    </div>
                    <a href="{{ route('news.category.show', $category['slug']) }}" class="small float-right">
                        Больше новостей из рубрики "{{ $category['name'] }}"
                    </a>
                </div>
                @else
                    <h3>Зарегистрируйтесь, чтобы прочитать новость </h3>
                @endif
            </div>
        </div>
    </div>

@endsection

