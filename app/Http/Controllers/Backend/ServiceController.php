<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function sList(){
        return view('backend.pages.service.index');
    }

    public function sForm(){
        return view('backend.pages.service.form');
    }
}
