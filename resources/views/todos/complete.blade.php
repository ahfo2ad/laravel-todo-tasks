@if ($todo->completed)
    <span onclick="event.preventDefault();document.getElementById('todo-notcomplete-{{ $todo->id }}').submit()">
        <i class="fa-solid fa-check fa-2xl" style="color: green; cursor: pointer;"></i>
    </span>
    <form action="{{ route('todo.notcomplete', $todo->id) }}" method="post" id="{{ 'todo-notcomplete-' . $todo->id }}" style="display: none">
        @csrf
        @method('delete')
    </form>
@else
    <span onclick="event.preventDefault();document.getElementById('todo-complete-{{ $todo->id }}').submit()">
        <i class="fa-solid fa-check fa-2xl" style="color: #ccc; cursor: pointer;"></i>
    </span>
    <form action="{{ route('todo.complete', $todo->id) }}" method="post" id="{{ 'todo-complete-' . $todo->id }}" style="display: none">
        @csrf
        @method('put')
    </form>
@endif
