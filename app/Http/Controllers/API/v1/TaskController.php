<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Http\Resources\TaskResource;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return TaskResource::collection(Task::where('user_id', auth()->id())->get());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {  
        // Validate and create the task  and make sure is logged in before store task
       if(auth()->user() !== null) {
        $task = Task::create($request->validated() + ['user_id' => auth()->id()]);
        return new TaskResource($task); 
       }
        return $this->ErrorResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
         if($task->user_id !== auth()->id()) {
            return $this->ErrorResponse();
        }
         return new TaskResource($task);
    }


    public function update(Task $task, UpdateTaskRequest $request)
    {
        if($task->user_id !== auth()->id()) {
            return $this->ErrorResponse();
        }
          $task->update($request->validated());
          return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }

    public function ErrorResponse()
    {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
