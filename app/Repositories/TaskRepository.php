<?php

namespace App\Repositories;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function createTask($data)
    {
        try {
            $data['user_id'] = auth()->id();

            $task = $this->task::create($data);

            return 'created';
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function search()
    {

        $searchQuery = request()->input('search');

        $filteredTasks = $this->task::where(function ($query) use ($searchQuery) {
                $query->orWhere('title', 'LIKE', "%$searchQuery%")
                    ->orWhere('description', 'LIKE', "%$searchQuery%")
                    ->orWhere('due_date', 'LIKE', "%$searchQuery%");
            })
            ->get();
        return $filteredTasks;
    }

    public function deleteTask($taskId)
    {
        try {
            $task = $this->task::findOrFail($taskId);
            $task->delete();

        } catch (UnauthorizedException $error) {

            throw new Exception('not found or not authorized');
        } catch (Exception $error) {

            throw $error;
          
        }

    }

    public function update($request,$taskId)
    {
        try {
        
            $task = $this->task::findOrFail($taskId);
            $task->update($request);
            return $task;

        } catch (UnauthorizedException $error) {

            throw new Exception('not found or not authorized');
        } catch (Exception $error) {

            throw $error;
          
        }

    }

}
