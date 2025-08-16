<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class WebHomeController extends Controller
{
    //homepage view
    public function home()
    {
        try {
            $services = Service::all();
            return view('frontend.pages.homepage', compact('services'));
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

    public function all_services()
    {
        $services = Service::all();
        return view('frontend.pages.services', compact('services'));
    }

    public function all_gallery()
    {
        $galleries = Gallery::all();
        return view('frontend.pages.gallery', compact('galleries'));
    }

    public function all_video()
    {
        $videos = Video::all()->map(function ($video) {
            $video->video_url = trim($video->video_url, '"'); // extra double quotes remove
            return $video;
        });
        return view('frontend.pages.video', compact('videos'));
    }

    public function gallery_images($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('frontend.pages.images', compact('gallery'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong.' . $e->getMessage());
            return redirect()->back();
        }
    }
}
