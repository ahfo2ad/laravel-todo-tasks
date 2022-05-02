@extends('todos.layout')

@section('content')

    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="">{{ $todo->title }}</h1>

        <span>
            <a href="{{ route('todo.index') }}" ><i class="fa-solid fa-arrow-right"></i></a>
        </span>
    </div>
    <div class="card-body" style="justify-content:center; padding-top:30px">
        <div>
            <p>{{ $todo->description }}</p>
        </div>

        @if ($todo->steps->count() > 0)

        <div>
            <h2>steps for this task</h2>
            @foreach ($todo->steps as $step)

                <p>{{ $step->name }}</p>

            @endforeach
        </div>

        @endif
    </div>

@endsection
