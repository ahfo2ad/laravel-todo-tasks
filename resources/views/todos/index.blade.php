@extends('todos.layout')

@section('content')

    <div class="d-flex justify-content-center p-2 align-items-center card-header">
        <h1 style="margin-right:50px">All Your Todos</h1>
        <a href="{{ route('todo.create') }}" class="btn btn-primary p-3">Create New</a>
    </div>
    <div class="card-body" style="justify-content:center d-flex align-items-center">
        <ul style="list-style:none;padding: 0;">
            <x-alert />
            @forelse ($todos as $todo)

                <li class="d-flex justify-content-between align-items-center" style="margin-bottom:10px">
                    @include('todos.complete')
                    @if ($todo->completed)
                        <a href="{{ route('todo.show', $todo->id) }}" style="text-decoration: line-through;">{{ $todo->title }}</a>
                    @else
                        <a href="{{ route('todo.show', $todo->id) }}" style="font-weight:bold; text-decoration: none;">{{ $todo->title }}</a>
                    @endif
                    <div>

                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                        <span onclick="event.preventDefault();

                            if(confirm('are you sure')){

                                document.getElementById('todo-delete-{{ $todo->id }}').submit()
                            }">
                            <i class="fa-solid fa-trash-can" style="color: red;cursor: pointer;font-size:25px;margin-left:10px"></i>
                        </span>
                        <form action="{{ route('todo.destroy', $todo->id) }}" method="post" id="{{ 'todo-delete-' . $todo->id }}" style="display: none">
                            @csrf
                            @method('delete')
                        </form>

                    </div>
                </li>
                @empty
                    <p>no task available. create yours</p>
            @endforelse
        </ul>
    </div>

@endsection
