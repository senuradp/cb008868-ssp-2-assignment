<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function loginAdmin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:6',
        ],[
            'email.exists' => 'This email is not registered',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
    }

    function logoutAdmin(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
