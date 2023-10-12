<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

  public function createTask($data)
  {
   try{
    $data['user_id'] = auth()->id();
    
    $task=$this->task::create($data);
    
    return 'created';
    }catch (\Throwable $th) {
        dd($th);
    }
    
  }

}
