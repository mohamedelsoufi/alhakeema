<?php


namespace App\Repositories;


use App\Events\RealTimeTaskEvent;
use App\Events\UpdateTaskStatus;
use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAllTasks()
    {
        try {
            $tasks = $this->task->latest('id')->get();
            return $tasks;
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function userTasks()
    {
        try {
            $my_tasks = $this->task->where('user_id',auth('web')->user()->id)->latest('id')->get();
            return $my_tasks;
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function getTaskById($id)
    {
        try {
            $task = $this->task->find($id);
            return $task;
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function createTask(TaskRequest $request)
    {
        try {
            $request_data = $request->except(['_token']);
            $this->task->create($request_data);
            return redirect()->route('tasks.index')->with('success','Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function updateTask(TaskRequest $request, $id)
    {
        try {
            $task = $this->task->find($id);
            $request_data = $request->except(['_token']);
            $task->update($request_data);
            event(new UpdateTaskStatus($task->status));
            return redirect()->route('tasks.index')->with('success','Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function deleteTask($id)
    {
        try {
            $task = $this->task->find($id);
            $task->delete();
            return redirect()->route('tasks.index')->with('success','Deleted Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }
}
