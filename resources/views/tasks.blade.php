<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Task List</h1>
        <a href="http://127.0.0.1:8000/addTask" class="btn btn-success mt-3">Add Task</a>
        <br></br>
        <div class="list-group">
        @if (!empty($tasks))
    @foreach($tasks as $task)
        <a href="#" class="list-group-item list-group-item-action">
            <h4 class="mb-1">{{ $task->title }}</h4>
            <p class="mb-1">Description: {{ $task->description }}</p>
            <p class="mb-1">Due Date: {{ $task->due_date }}</p>
            <p class="mb-1">Status: {{ $task->status }}</p>
            <button class="btn btn-primary">Edit</button>
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
