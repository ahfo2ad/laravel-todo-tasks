@extends('todos.layout')

@section('content')

    <h1 class="d-flex justify-content-center p-3 align-items-center card-header">what next you need to-do</h1>
    <x-alert />
    <div class="card-body" style="justify-content:center; padding-top:30px">
        <form action="{{ route('todo.store') }}" method="post">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="Title">

            <textarea class="form-control" rows="5" name="description" placeholder="Description" style="margin: 10px 0"></textarea>

            {{-- <div class="card-header d-flex justify-content-around p-4 align-items-center">
                <h2 class="">steps required</h2>
                <span style="cursor: pointer"><i class="fa-solid fa-circle-plus fa-xl"></i></span>
            </div> --}}
            <livewire:step />
            {{-- <input type="text" name="step" class="form-control" placeholder="descripe steps"> --}}

            <input type="submit" value="Create" class="btn btn-primary btn-lg" style="margin-top:20px">
        </form>
        {{-- <livewire:step /> --}}
        {{-- @livewire('counter') --}}
        {{-- @livewire('step') --}}
        <a href="{{ route('todo.index') }}" class="btn btn-outline-dark" style="margin-top:50px">Home</a>
    </div>

@endsection
