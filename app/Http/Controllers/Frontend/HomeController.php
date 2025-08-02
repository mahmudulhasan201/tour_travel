<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('frontend.pages.homepage');
    }

    public function aboutUs(){
        return view('frontend.pages.about');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function applicationCreate(){
        return view('frontend.pages.application_status_form');
    }


}
