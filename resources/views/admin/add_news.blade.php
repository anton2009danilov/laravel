@extends('layouts.main')

@section('title')
    @parent Админка-Тест1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container mt-2">

        <h3>Форма для добавление новости</h3>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Категория</label>

                <select class="form-control" id="exampleFormControlSelect1">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Текст новости</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Создать новость</button>
            </div>
        </form>
    </div>
@endsection



