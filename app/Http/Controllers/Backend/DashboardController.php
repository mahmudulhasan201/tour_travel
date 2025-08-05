<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    //dashboard view
    public function homepage()
    {
        try {
            return view('backend.pages.dashboard');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Dashboard.');
            return redirect()->back();
        }
    }
}
