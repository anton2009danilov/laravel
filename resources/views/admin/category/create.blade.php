<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка | Создать\Редактировать Категорию
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header font-weight-bold">Форма для добавление категории</div>
        <div class="card-body">

            <form enctype="multipart/form-data" method="POST"
                  action="@if(!$category->id){{ route('admin.category.create')}}@else{{ route('admin.category.update', $category)}} @endif">
                @csrf
                <div class="form-group">
                    <label for="name">Название</label>
                    <input name="name" value="{{ $category->name ?? old('name') }}" type="text" class="form-control"
                           id="name" placeholder="Название">
                </div>

                <div class="form-group">
                    <label for="slug">Псевдоним</label>
                    <input name="slug" value="{{ $category->slug ?? old('slug') }}" type="text" class="form-control"
                           id="slug" placeholder="Псевдоним">
                </div>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary form-control">
                        @if ($category->id) Изменить @else Добавить @endif
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection



