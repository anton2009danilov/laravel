@extends('layouts.main')

@section('title')
    @parent Админка-Тест2
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h1>Тест 2</h1>
        </div>
    </div>

@endsection
