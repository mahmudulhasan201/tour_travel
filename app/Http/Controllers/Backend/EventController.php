<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eList(){
        return view('backend.pages.event.index');
    }

    public function eForm(){
        return view('backend.pages.event.form');
    }
}
