<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        $user = User::where('email', $request->email)->first();
        $remember = $request->has('remember');
        if (!$user) {
            return back()->withErrors(['email' => 'User does not exist.'])->withInput($request->only('email'));
        }

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput($request->only('email'));
        }else{
            return redirect('/article_list')->with('success', 'Loged in as '. auth()->user()->name);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
