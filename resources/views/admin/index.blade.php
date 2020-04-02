@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-5">
                    <div class="card-body">
                        <h1>Админка</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
