<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // start login view
    public function login()
    {
        return view('auth.login');
    }
    // end of login view

    // start proceed login
    public function authenticate(LoginRequest $request)
    {
        try {
            Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1]);

            $request->session()->regenerate();

            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Incorrect Email Or Password']);
        }
    }
    // end proceed login

    // start logout function
    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }
    // end logout function
}
