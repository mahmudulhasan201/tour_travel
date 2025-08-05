<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function eList()
    {
        try {
            return view('backend.pages.event.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Event List page.');
            return redirect()->back();
        }
    }

    public function eForm()
    {
        try {
            return view('backend.pages.event.form');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Event Form page.');
            return redirect()->back();
        }
    }
}
