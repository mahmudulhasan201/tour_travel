<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class AuthController extends Controller
{
    //admin login form view
    public function showLoginForm()
    {
        try {
            return view('backend.pages.adminLogin');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the admin login form.');
            return redirect()->back();
        }
    }

    //admin login form submit
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $remember = $request->filled('remember'); // true if checkbox is checked

            if (Auth::guard('admin')->attempt($credentials, $remember)) {
                Alert::success('Success', 'Welcome back, Admin!');
                return redirect()->route('dashboard');
            }

            Alert::error('Error', 'Invalid credentials! Please try again.');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //admin logout
    public function adminLogout()
    {
        try {
            Auth::guard('admin')->logout();
            Alert::success('Success', 'Log out Successfully.');
            return redirect()->route('login');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while logging out.');
            return redirect()->back();
        }
    }
}
