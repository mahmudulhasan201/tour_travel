<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function gList()
    {
        try {
            return view('backend.pages.gallery.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Gallery List page.');
            return redirect()->back();
        }
    }

    public function gForm()
    {
        try {
            return view('backend.pages.gallery.form');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Gallery Form page.');
            return redirect()->back();
        }
    }
}
