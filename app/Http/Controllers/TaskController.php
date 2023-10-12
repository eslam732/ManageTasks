<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index() {
        $tasks = auth()->user()->tasks; // Retrieve your tasks data here
        return view('tasks', ['tasks' => $tasks]);
    }

    public function createTask()
    {
        
       $task= $this->taskService->createTask();
      
       if($task=='created'){
 
        return redirect()->route('tasks');

      //  return view('tasks', ['tasks' => auth()->user()->tasks]);
       }
    }
}
