<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if($user){
            // Auth::login($user);
            return redirect()->route('user.home')->with('success', 'Successfully registered');
        }else{
            return redirect()->route('user.register')->with('error', 'Something went wrong');
        }
    }

    function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ],[
            'email.exists' => 'This email is not registered',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.home');
        }
        return redirect()->route('user.login')->with('error', 'Invalid Credentials');
    }

    function logoutUser(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

}
