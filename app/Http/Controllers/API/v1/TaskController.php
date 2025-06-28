<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        Gate::authorize('viewAny', Task::class);
        return TaskResource::collection(Task::where('user_id', auth()->id())->get());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {  
        // Validate and create the task  and make sure is logged in before store task
        Gate::authorize('create', Task::class);
        $task = Task::create($request->validated() + ['user_id' => auth()->id()]);
        return new TaskResource($task); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
         Gate::authorize('view',$task);
         return new TaskResource($task);
    }


    public function update(Task $task, UpdateTaskRequest $request)
    {
          Gate::authorize('update', $task);
          $task->update($request->validated());
          return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete' , $task);
        $task->delete();
        return response()->noContent();
    }
}
