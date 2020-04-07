<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка-Тест1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header font-weight-bold">Форма для добавление новости</div>
        <div class="card-body">

            <form method="POST" action="{{ route('admin.create') }}">
                @csrf

{{--                {{ Form::label('title', 'Название') }}--}}

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    @if (!empty($categories))
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach ($categories as $category)
                                <option @if ($category['id'] == old('category')) selected @endif value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                            @endforeach
                        </select>
                    @else
                        <h2>Нет категорий</h2>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Текст новости</label>
                    <textarea name="text" class="form-control" id="text" rows="3">{{ old('text') }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input @if (old('isPrivate') == 1) checked @endif type="checkbox" value="1" name="isPrivate" class="form-check-input" id="private">
                    <label class="form-check-label" for="private">Доступно только зарегистрированным пользователям</label>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Создать новость</button>
                </div>

            </form>

        </div>
    </div>
@endsection



