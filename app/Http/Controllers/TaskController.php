<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        
        $tasks = Task::get();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function filterdTasks($tasks)
    {

        return view('tasks', ['tasks' => $tasks]);
    }
    public function create()
    {

        return view('addTask');

    }


    public function store(TaskCreateRequest $request)
    {

        try {
            $this->taskService->createTask($request->all());
            return redirect()->route('tasks.index');
        } catch (Exception $e) {
            return view('addTask', ['error' => $e->getMessage()]);
        }
       
    }

    public function search()
    {

        $filteredTasks = $this->taskService->search();

        return view('tasks', ['tasks' => $filteredTasks]);
    }

    public function destroy($taskId)
    {

        try {
            $this->taskService->deleteTask($taskId);
            return redirect()->route('tasks.index');
        } catch (Exception $e) {

           return view('errors',['error_message' => $e->getMessage()]);
        }

    }

    public function edit($taskId)
    {

        try {
            $task=Task::findOrFail($taskId);
            return view('editTask',['task'=>$task]);
        } catch (Exception $e) {

           return view('errors',['error_message' => $e->getMessage()]);
        }

    }

    public function update(TaskUpdateRequest $request,$taskId)
    {

        try {
       
           $this->taskService->update($request->all(),$taskId);

            return redirect()->route('tasks.index');
        } catch (Exception $e) {

           return view('errors',['error_message' => $e->getMessage()]);
        }

    }

}
