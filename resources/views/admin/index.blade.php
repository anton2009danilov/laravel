@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h1>Админка</h1>
        </div>
    </div>
@endsection
