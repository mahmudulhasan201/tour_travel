<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function customerSignup()
    {
        return view('frontend.customerAuth.signup');
    }

    public function submitSignup(Request $request)
    {
        //Validation
        $checkValidation = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
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
            $image = '';
            if ($request->hasFile('image')) {
                $image = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('/customers', $image);
            }

            Customer::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'image'      => $image,
            ]);

            Alert::success('Success', 'Sign Up Successful');
            return redirect()->route('homepage');
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }




    public function signinForm()
    {
        return view('frontend.customerAuth.signin');
    }


    public function submitSignin(Request $request)
    {
        //Validation
        $checkValidation = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        $customerInput = $request->except('_token');
        $checkLogin = auth()->guard('customerGuard')->attempt($customerInput);

        if ($checkLogin) {
            $customer = auth('customerGuard')->user();

            if ($checkLogin) {
                return redirect()->route('homepage');
            } else {
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
        }
    }

    //LogOut
    public function logout()
    {
        auth()->guard('customerGuard')->logout();
        return redirect()->route('homepage')->with('success', 'You have been logged out.');
    }
}
