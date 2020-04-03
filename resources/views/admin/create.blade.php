<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка-Тест1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-header font-weight-bold">Форма для добавление новости</div>
        <div class="card-body">

            <form method="POST" action="{{ route('admin.create') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="category">Категория</label>
                    @if (!empty($categories))
                        <select name="category" class="form-control" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                            @endforeach
                        </select>
                    @else
                        <h2>Нет категорий</h2>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Текст новости</label>
                    <textarea name="text" class="form-control" id="text" rows="3"></textarea>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="private">Новость доступна только зарегистрированным пользователям</label>--}}
{{--                    <input name="private" type="checkbox" value="1" class="form-control" id="private">--}}
{{--                </div>--}}
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Доступно только зарегистрированным пользователям</label>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Создать новость</button>
                </div>

            </form>

        </div>
    </div>
@endsection



