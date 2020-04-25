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

                        <form action="{{ route('admin.users.update', $item) }}" method="post">
                            @csrf
                            <input type="checkbox" name="isAdmin" hidden
                                   value="@if($item->isAdmin){{__('true')}}@else{{__('false')}}@endif">
                            @if(!$item->isAdmin)
                                <button type="submit"
                                        class="btn btn-success float-right mr-1">{{__('Назначить администратором')}}</button>
                            @else
                                <button type="submit"
                                        class="btn btn-danger float-right mr-1">{{__('Убрать из списка администраторов')}}</button>
                            @endif
                        </form>

                        <button data-id="{{ $item->id }}" class="testApi">Test Api</button>

                    </div>
                @empty
                    <h3>Пользователей</h3>
                @endforelse
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <script>
        let buttons = document.querySelectorAll('.testApi');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                (async () => {
                    const response = await fetch('/api/apiTest/?id=' + id);
                    const answer = await response.json();
                    console.log(answer);
                })();
            })
        })
    </script>
@endsection
