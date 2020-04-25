<?php //$categories = []?>
@extends('layouts.main')

@section('title')
    @parent Админка | Добавить RSS
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header font-weight-bold">{{__('Форма для добавление RSS-ресурса')}}</div>
        <div class="card-body">

            <form enctype="multipart/form-data" method="POST"
                  action="{{ route('admin.resources.create') }}">
                @csrf
                <div class="form-group">
                    <label for="rss">Ссылка на RSS-ресурс</label>
                    <input name="rss" value="{{ old('name')}}" type="text"
                           class="form-control @if($errors->has('rss')) is-invalid @endif"
                           id="rss" placeholder="https://aif.ru/rss/money.php">
                    @if($errors->has('rss'))
                        <small class="text-danger">
                            @foreach($errors->get('rss') as $error)
                                {{ $error }}
                            @endforeach
                        </small>
                    @endif
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary form-control">Добавить</button>
                </div>
            </form>

        </div>
    </div>
@endsection



