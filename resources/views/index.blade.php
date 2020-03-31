@extends('layouts.main')

@section('title')
    @parentГлавная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-5 m-5">
                    <h1>Добро пожаловать!</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
