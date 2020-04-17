<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка | Создать\Редактировать Новость
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-header font-weight-bold">
            @if ($news->id){{__('Форма для редактирования новости')}}
            @else{{__('Форма для добавление новости')}}@endif
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST"
                  action="@if(!$news->id){{ route('admin.news.create')}}@else{{ route('admin.news.update', $news)}} @endif">
                @csrf

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input name="title" value="{{  old('title') ?? $news->title }}" type="text"
                           class="form-control @if($errors->has('title')) is-invalid @endif"
                           id="title" placeholder="Заголовок">
                    @if($errors->has('title'))
                        <small class="text-danger">
                            @foreach($errors->get('title') as $error)
                                {{ $error }}
                            @endforeach
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    @if (!empty($categories))
                        <select name="category_id"
                                class="form-control @if($errors->has('category_id')) is-invalid @endif"
                                id="category_id">
                            @foreach ($categories as $category)
                                <option
                                    @if ($category->id == old('category_id') || $category->id == $news->category_id) selected
                                    @endif value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
{{--                                <option value="33">33</option>--}}
                        </select>
                        @if($errors->has('category_id'))
                            <small class="text-danger">
                                @foreach($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </small>
                        @endif
                    @else
                        <h2>Нет категорий</h2>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Текст новости</label>
                    <textarea name="text"
                              class="form-control @if($errors->has('text')) is-invalid @endif"
                              id="text" rows="3">@if(\Arr::has(old(), 'text') && old('text') == null)@else{{ old('text') ?? $news->text }}@endif</textarea>
                    @if($errors->has('text'))
                        <small class="text-danger">
                            @foreach($errors->get('text') as $error)
                                {{ $error }}
                            @endforeach
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <input type="file" name="image"
                           @if($errors->has('image')) class="bg-danger" @endif>

                    @if($errors->has('image'))
                        <small class="text-danger">
                            @foreach($errors->get('image') as $error)
                                {{ $error }}
                            @endforeach
                        </small>
                    @endif
                </div>

                <div class="form-group form-check">
                    <input @if (old('isPrivate') == 1 || $news->isPrivate == 1) checked @endif
                    type="checkbox" value="1" name="isPrivate" class="form-check-input" id="private">
                    <label class="form-check-label" for="private">
                        Доступно только зарегистрированным пользователям
                    </label>
                    @if($errors->has('isPrivate'))
                        <div>
                            <small class="text-danger">
                                @foreach($errors->get('isPrivate') as $error)
                                    {{ $error }}
                                @endforeach
                            </small>
                        </div>
                    @endif
                </div>
                <div class="col-sm-10">
                    <button type="submit"
                            class="btn btn-outline-primary
                            form-control">@if ($news->id){{__('Изменить')}} @else{{__('Добавить')}}@endif</button>
                </div>

            </form>

        </div>
    </div>
@endsection



