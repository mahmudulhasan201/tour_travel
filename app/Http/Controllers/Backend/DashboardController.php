<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Gallery;
use App\Models\GlobalOffice;
use App\Models\Review;
use Exception;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    //dashboard view
    public function homepage()
    {
        try {

             $totalJobApplications = Application::count();
            $totalReviews = Review::count();
            $totalGallery = Gallery::count();
            $totalDownloads = GlobalOffice::count();

            // Pass counts to the dashboard view
            return view('backend.pages.dashboard', compact(
                'totalJobApplications',
                'totalReviews',
                'totalGallery',
                'totalDownloads'
            ));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Dashboard.');
            return redirect()->back();
        }
    }
}
