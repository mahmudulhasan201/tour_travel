<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\GlobalOffice;
use App\Models\Review;
use App\Models\Service;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class WebHomeController extends Controller
{
    //homepage view
    public function home()
    {
        try {
            $reviews = Review::where('status', 'active')->get();
            $services = Service::where('type', 'special')
                ->where('status', 'active')
                ->get();
            return view('frontend.pages.homepage', compact('services', 'reviews'));
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

    //Service
    public function all_services()
    {
        $services = Service::where('status', 'active')->get();
        return view('frontend.pages.services', compact('services'));
    }

    //Visa success(video & Gallery)
    public function all_gallery()
    {
        $galleries = Gallery::where('status', 'active')->get();
        return view('frontend.pages.gallery', compact('galleries'));
    }

    public function all_video()
    {
        $videos = Video::where('status', 'active')
            ->get()
            ->map(fn($video) => tap($video, function ($v) {
                $v->video_url = trim($v->video_url, '"');
            }));
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

    //Global Office
    public function officeIndex()
    {
        try {
            $offices = GlobalOffice::all();
            return view('frontend.pages.office', compact('offices'));
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Office page.');
            return redirect()->back();
        }
    }

    //review
    public function reviewIndex()
    {
        try {
            $reviews = Review::where('status', 'active')->get();
            return view('frontend.pages.review', compact('reviews'));
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Revieew page.');
            return redirect()->back();
        }
    }

    //policy
    public function policyIndex()
    {
        try {
            return view('frontend.pages.policy');
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Policy page.');
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

    public function contactStore(Request $request)
    {

        try {
            $checkValidation = Validator::make($request->all(), [

                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'nullable',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            Contact::create([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            Alert::success('Success', "Send Successfully.");
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while sending message. ' . $e->getMessage());
            return redirect()->back();
        }
    }

    //Application Status
    public function status()
    {
        try {
            return view('frontend.pages.application_status');
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load this page.');
            return redirect()->back();
        }
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'passport_no' => 'required|string',
            'invoice' => 'required|string',
            'date' => 'required|date',
        ]);

        // Check in the applications table
        $application = Application::where('invoice_no', $request->invoice)->first();

        $statusMessage = null;

        if ($application) {
            if ($application->status === 'approved') {
                $statusMessage = 'Your application is approved.';
            } elseif ($application->status === 'pending') {
                $statusMessage = 'Your application is pending.';
            } elseif ($application->status === 'rejected') {
                $statusMessage = 'Your application has been rejected.';
            } else {
                $statusMessage = 'Application status is: ' . ucfirst($application->status);
            }
        } else {
            $statusMessage = 'No application found with the provided details.';
        }

        return view('frontend.pages.application_status', compact('statusMessage'));
    }
}
