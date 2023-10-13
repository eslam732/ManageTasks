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

    public function createTask($request)
    {

        return $this->taskRepository->createTask($request);
    }

    public function search()
    {
      return $this->taskRepository->search();
    }

    public function deleteTask($taskId)
    {
      return $this->taskRepository->deleteTask($taskId);
    }

    public function update($request,$taskId)
    {
      return $this->taskRepository->update($request,$taskId);
    }


}
