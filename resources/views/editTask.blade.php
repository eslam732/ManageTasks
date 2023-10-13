<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update',$task->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
             id="title" name="title" value="{{ $task->title }}" required>

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control form-control @error('description') is-invalid @enderror"
                 id="description" name="description" required>{{  $task->description }}</textarea>
                 @error('description')
                 <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
            

            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" class="form-control @error('due_date') is-invalid @enderror"
                 id="due_date" name="due_date" value="{{ $task->due_date }}" required>

                @error('due_date')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="not_started">Not Started</option>
                    <option value="started">Started</option>
                    <option value="finished">Finished</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit Task</button>
        </form>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
