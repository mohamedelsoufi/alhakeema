<?php


namespace App\Repositories;


use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        try {
            $users = $this->user->latest('id')->get();
            return $users;
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function getUserById($id)
    {
        try {
            $user = $this->user->find($id);
            return $user;
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function createUser(UserRequest $request)
    {
        try {
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            if (!$request->has('is_admin'))
                $request->request->add(['is_admin' => 0]);
            $request_data = $request->except(['_token','password_confirmation']);
            $this->user->create($request_data);
            return redirect()->route('users.index')->with('success','Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function updateUser(UserRequest $request, $id)
    {
        try {
            $user = $this->user->find($id);
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            if (!$request->has('is_admin'))
                $request->request->add(['is_admin' => 0]);

            if ($request->has('password')) {
                $request_data['password'] = $request->password;
            }
            $request_data = $request->except(['_token','password','password_confirmation']);
            $user->update($request_data);
            return redirect()->route('users.index')->with('success','Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = $this->user->find($id);
            $current_user = auth::guard('web')->id();
            if ($current_user == $user->id) {
                return redirect()->back()->with('error', 'You can not delete active session please contact your administrator');
            }
            $user->delete();
            return redirect()->route('users.index')->with('success','Deleted Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    }
}
