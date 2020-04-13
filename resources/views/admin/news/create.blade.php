<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка | Создать\Редактировать Новость
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    @dump($errors->first('title'))
    <div class="card mt-3">
        <div class="card-header font-weight-bold">Форма для добавление новости</div>
        <div class="card-body">

            <form enctype="multipart/form-data" method="POST"
                  action="@if(!$news->id){{ route('admin.news.create')}}@else{{ route('admin.news.update', $news)}} @endif">
                @csrf

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input name="title" value="{{ $news->title ?? old('title') }}" type="text"
                           class="form-control @if($errors->first('title')) is-invalid @endif"
                           id="title" placeholder="Заголовок">
                    @if($errors->first('title'))
                        <small class="text-danger">
                            {{ $errors->first('title') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    @if (!empty($categories))
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach ($categories as $category)
                                <option
                                    @if ($category->id == $news->category_id || $category->id == old('category')) selected
                                    @endif value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    @else
                        <h2>Нет категорий</h2>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Текст новости</label>
                    <textarea name="text" class="form-control" id="text"
                              rows="3">{{ $news->text ?? old('text') }}</textarea>
                </div>

                <div class="form-group">
                    <input type="file" name="image">
                </div>

                <div class="form-group form-check">
                    <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif type="checkbox" value="1"
                           name="isPrivate" class="form-check-input" id="private">
                    <label class="form-check-label" for="private">Доступно только зарегистрированным
                        пользователям</label>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary form-control">
                        @if ($news->id) Изменить @else Добавить @endif
                    </button>
                    {{--                    <button type="submit" class="btn btn-outline-primary form-control">Создать новость</button>--}}
                </div>

            </form>

        </div>
    </div>
@endsection



