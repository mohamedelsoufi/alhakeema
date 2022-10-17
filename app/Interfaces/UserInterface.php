<?php

namespace App\Interfaces;

use App\Http\Requests\UserRequest;

interface UserInterface
{
    public function getAll();

    public function getUserById($id);

    public function createUser(UserRequest $request);

    public function updateUser(UserRequest $request, $id);

    public function deleteUser($id);
}
