<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">

        <h1>Task List</h1>
        <a href="http://127.0.0.1:8000/addTask" class="btn btn-success mt-3">Add Task</a>
        <br><br>
        <form method="POST" action="{{ route('search') }}" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search tasks" value="{{ old('search') }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br><br>
        <div class="list-group">
        @if (!empty($tasks))
    @foreach($tasks as $task)
        <a href="#" class="list-group-item list-group-item-action">
            <h4 class="mb-1">{{ $task->title }}</h4>
            <p class="mb-1">Description: {{ $task->description }}</p>
            <p class="mb-1">Due Date: {{ $task->due_date }}</p>
            <p class="mb-1">Status: {{ $task->status }}</p>
            <form action="{{ route('tasks.edit', $task->id) }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </a>
    @endforeach
    @else
    <p>No tasks available.</p>
@endif
</div>


    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
