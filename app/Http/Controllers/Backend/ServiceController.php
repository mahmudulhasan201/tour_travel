<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function sList()
    {
        try {
            return view('backend.pages.service.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Service List page.');
            return redirect()->back();
        }
    }

    public function sForm()
    {
        try {
            return view('backend.pages.service.form');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Service Form page.');
            return redirect()->back();
        }
    }
}
