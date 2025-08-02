<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.pages.adminLogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials!',
        ])->withInput();
    }

    //logout
    public function adminLogout()
    {
        Auth::logout(); //(works in laravel 11)
        // auth()->logout();(works in laravel 10)

        // notify()->success("Sign Out Successful.");
        return redirect()->route('login');
    }
}



