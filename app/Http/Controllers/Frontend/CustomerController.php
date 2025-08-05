<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\FileUploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    //customer sign-up form view
    public function customerSignup()
    {
        try {
            return view('frontend.customerAuth.signup');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Customer Sign-up Form.');
            return redirect()->back();
        }
    }

    ////customer sign-up form submit
    public function submitSignup(Request $request)
    {
        $checkValidation = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:customers,email',
            'password'   => 'required|min:6',
            // 'phone_number' => 'required',
            // 'address' => 'required|string|max:500',
            // 'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($checkValidation->fails()) {
            $errorMessage = $checkValidation->errors()->first();
            Alert::warning('Warning', $errorMessage);
            return redirect()->back();
        }

        try {

            $image = FileUploadService::fileUpload($request->file('image'), '/customers');

            Customer::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'image'      => $image,
            ]);

            Alert::success('Success', 'Sign Up Successful');
            return redirect()->route('homepage');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //customer sign-in form view
    public function signinForm()
    {
        try {
            return view('frontend.customerAuth.signin');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Sign-in Form.');
            return redirect()->back();
        }
    }

    //customer sign-up form submit
    public function submitSignin(Request $request)
    {
        try {
            $checkValidation = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::warning('Warning', $errorMessage);
                return redirect()->back();
            }

            $credentials = $request->only('email', 'password');

            if (auth()->guard('customerGuard')->attempt($credentials)) {
                return redirect()->route('homepage');
            } else {
                Alert::error('Error', 'Invalid credentials. Please try again.');
                return redirect()->back();
            }
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->route('customer.signin');
        }
    }

    //customer sign-out
    public function logout()
    {
        try {
            auth()->guard('customerGuard')->logout();
            Alert::success('Success', 'You have been logged out.');
            return redirect()->route('homepage');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while logging out.');
            return redirect()->back();
        }
    }
}
