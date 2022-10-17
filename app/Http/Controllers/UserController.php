<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    // get all users start
    public function index()
    {
        $users = $this->user->getAll();
        return view('users.index',compact('users'));
    }
    // get all users end

    // create new user view start
    public function create()
    {
       return view('users.create');
    }
    // create new user view end

    // save new user start
    public function store(UserRequest $request)
    {
        return $this->user->createUser($request);
    }
    // save new user end

    // get user by id start
    public function show($id)
    {
        $user = $this->user->getUserById($id);
        return view('users.show',compact('user'));
    }
    // get user by id end

    // edit user by id start
    public function edit($id)
    {
        $user = $this->user->getUserById($id);
        return view('users.edit',compact('user'));
    }
    // edit user by id end

    // update user by id start
    public function update(UserRequest $request, $id)
    {
        return $this->user->updateUser($request,$id);
    }
    // update user by id end

    // delete user by id start
    public function destroy($id)
    {
        return $this->user->deleteUser($id);
    }
    // delete user by id end
}
