@extends('layouts.main')

@section('title')
    @parent Админка | Пользователи
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

            <h1 class="text-center mt-1">Админка | Пользователи</h1>


    <div class="card mt-3">
        <div class="card-body">
            <div class="list-group">
                @forelse ($users as $item)

                    <div class="list-group-item m-2">
                        <h3>{{ $item->name }}</h3>
                        <small>@if($item->isAdmin)Пользователь с правами администратора@endif</small>

                        <form action="{{ route('admin.users.update', $item) }}" method="post" >
                            @csrf
                            <input type="checkbox" name="isAdmin" hidden value="@if($item->isAdmin){{__('1')}}@else{{__('0')}}@endif">
                            <button type="submit" class="btn btn-success float-right mr-1">@if(!$item->isAdmin){{__('Назначить администратором')}}
                                @else{{__('Убрать из списка администраторов')}}@endif</button>
                        </form>




                    </div>
                @empty
                    <h3>Пользователей</h3>
                @endforelse
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
