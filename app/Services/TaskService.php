<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask()
    {
        
        request()->validate([
            'title' => 'required|max:50',
            'description'=> 'required|max:150',
            'due_date'=> 'required|date|after:now',
        ]);

        return $this->taskRepository->createTask(request()->all());
    }

}
