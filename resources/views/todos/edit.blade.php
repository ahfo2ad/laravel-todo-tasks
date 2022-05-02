@extends('todos.layout')

@section('content')


    <h1 class="d-flex justify-content-center p-3 align-items-center card-header">Update Your to-do</h1>

     <x-alert />
     <div class="card-body" style="justify-content:center; padding-top:30px">
        <form action="{{ route('todo.update', $todo->id) }}" method="post">

            @csrf
            @method('patch')
            {{-- <div class="d-flex justify-content-center p-3 align-items-center"> --}}
            <div class="card-body" style="justify-content:center;">

                <input type="text" name="title" value="{{ $todo->title }}" class="form-control">

                <textarea class="form-control" rows="5" name="description" style="margin: 10px 0">{{ $todo->description }}</textarea>

                {{-- <livewire:editstep :steps="$todo->steps" /> --}}
                @livewire('editstep', ['steps' => $todo->steps])
                {{-- <livewire:show-post :post="$post"> --}}

                <input type="submit" value="Update" class="btn btn-primary btn-lg" style="margin-top: 20px">
            </div>
        </form>
        <a href="{{ route('todo.index') }}" class="btn btn-outline-dark" style="margin-top:50px">BACK</a>
    </div>

@endsection
