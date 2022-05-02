<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
// use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Model;

class TodoController extends Controller
{
    // for authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        // $todos = auth()->user()->todos()->orderBy('completed')->get();          orderBy = sortBy

        $todos = auth()->user()->todos->sortBy('completed');

        return view('todos.index', compact('todos'));
    }
    public function create() {

        return view('todos.create');
    }

    public function store(TodoCreateRequest $request) {

        $todo = auth()->user()->todos()->create($request->all());

        if($request->step) {

            foreach($request->step as $step) {

                $todo->steps()->create(['name'=>$step]);
            }

        }

        return redirect()->back()->with('message', 'Todo created successfully');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo) {

        // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo) {

        // $todo->update(['title'=>$request->title]);
        $todo->update($request->all());

        if($request->stepName) {

            foreach($request->stepName as $key=>$value) {

                $id = $request->stepId[$key];

                if(!$id) {
                    
                    $todo->steps()->create(['name'=>$value]);
                }
                else{

                    $step = Step::find($id);
                    $step->update(['name'=>$value]);
                }

            }

        }

        return redirect( route('todo.index') )->with('message', 'Updated Successfully');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect( route('todo.index') )->with('message', 'Marked as Completed To-Do');
    }

    public function notcomplete(Todo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect( route('todo.index') )->with('message', 'Marked as Un-Completed To-Do');
    }

    // public function delete(Todo $todo)

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect( route('todo.index') )->with('message', 'Task Deleted');
    }
}

