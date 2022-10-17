<?php

namespace App\Interfaces;

use App\Http\Requests\TaskRequest;

interface TaskInterface
{
    public function getAllTasks();

    public function userTasks();

    public function getTaskById($id);

    public function createTask(TaskRequest $request);

    public function updateTask(TaskRequest $request, $id);

    public function deleteTask($id);
}
