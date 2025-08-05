<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //homepage view
    public function home()
    {
        try {
            return view('frontend.pages.homepage');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Homepage.');
            return redirect()->back();
        }
    }

    //about-us view
    public function aboutUs()
    {
        try {
            return view('frontend.pages.about');
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load About-us page.');
            return redirect()->back();
        }
    }

    //contact view
    public function contact()
    {
        try {
            return view('frontend.pages.contact');
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Contact page.');
            return redirect()->back();
        }
    }

    //application view
    public function applicationCreate()
    {
        try {
            return view('frontend.pages.application_status_form');
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Application Status Form.');
            return redirect()->back();
        }
    }
}
