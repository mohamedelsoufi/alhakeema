<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;
    private $user;

    public function __construct(TaskInterface $task,UserInterface $user)
    {
        $this->task = $task;
        $this->user = $user;
    }

    // get all tasks for all users start
    public function index()
    {
        $tasks = $this->task->getAllTasks();
        return view('tasks.index',compact('tasks'));
    }
    // get all tasks for all users end

    // get user tasks start
    public function myTasks()
    {
        $tasks = $this->task->userTasks();
        return view('tasks.myTasks',compact('tasks'));
    }
    // get user tasks end

    // add new task start
    public function create()
    {
        try {
            $users = $this->user->getAll();
            return view('tasks.create',compact('users'));
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }
    // add new task end

    // save new task start
    public function store(TaskRequest $request)
    {
        return $this->task->createTask($request);
    }
    // save new task end

    // show task by id start
    public function show($id)
    {
        $task = $this->task->getTaskById($id);
        return view('tasks.show',compact('task'));
    }
    // show task by id end

    //edit task by id start
    public function edit($id)
    {
        $users = $this->user->getAll();
        $task = $this->task->getTaskById($id);
        return view('tasks.edit',compact('task','users'));
    }
    //edit task by id end

    //update task start
    public function update(TaskRequest $request, $id)
    {
        return $this->task->updateTask($request,$id);
    }
    //update task end

    // delete task by id start
    public function destroy($id)
    {
        return $this->task->deleteTask($id);
    }
    // delete task by id end
}
