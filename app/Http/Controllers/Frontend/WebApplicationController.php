<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Countries\Package\Services\Countries;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class WebApplicationController extends Controller
{
    public function applicationCreate()
    {
        try {
            $jobCategory = JobCategory::all();
            $countries = (new Countries())->all();

            $countryList = $countries->map(function ($country) {
                return $country->name->common;
            })->sort()->values();

            return view('frontend.pages.application', compact('jobCategory', 'countryList'));
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load Application Form.');
            return redirect()->back();
        }
    }

    public function applicationPreviewStore(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'jobCategory' => 'required',
                'phone' => 'required',
                'date' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'address' => 'nullable|string',
                'gender' => 'nullable|string',
                'dob' => 'nullable|date',
                'passport_no' => 'nullable|string',
                'nationality' => 'required',
                'current_country' => 'required',
                'englishCourse' => 'nullable|string',
                'experienceYear' => 'nullable|integer',
                'videoLink' => 'nullable|string',
                'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:1024',
                'cv' => 'nullable|file|mimes:pdf|max:1024',
            ]);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('temp'), $filename);
                $validated['avatar'] = 'temp/' . $filename; // session এ path save
            }

            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $filename1 = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('temp'), $filename1);
                $validated['cv'] = 'temp/' . $filename1; // session এ path save
            }

            Session::put('application_data', $validated);

            return redirect()->route('application.preview');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while preparing the preview.');
        }
    }

    public function applicationPreview()
    {
        try {
            $application = Session::get('application_data');
            // dd($application);

            if (!$application) {
                return redirect()->route('application.create')->with('error', 'No data found.');
            }

            if (isset($application['jobCategory'])) {
                $jobCategory = JobCategory::find($application['jobCategory']);
                $application['jobCategory_name'] = $jobCategory ? $jobCategory->jobCategory : '-';
            } else {
                $application['jobCategory_name'] = '-';
            }

            return view('frontend.pages.application_preview', compact('application'));
        } catch (Exception $e) {
            return redirect()->route('application.create')->with('error', 'Unable to load Application Preview.');
        }
    }

    public function applicationSubmit()
    {
        try {
            $application = Session::get('application_data');
            // dd($application);

            if (!$application) {
                return redirect()->route('homepage')->with('error', 'No data to submit.');
            }

            $invoice_no = 'INV-' . time();

            // $invoice_no = 'INV-' . rand(1000000, 9999999);

            $submittedApplication = Application::create([
                'job_category_id' => $application['jobCategory'],
                'phone' => $application['phone'],
                'date' => $application['date'],
                'name' => $application['name'],
                'email' => $application['email'],
                'address' => $application['address'],
                'gender' => $application['gender'],
                'dob' => $application['dob'],
                'avatar' => $application['avatar'],
                'passport_no' => $application['passport_no'],
                'nationality' => $application['nationality'],
                'current_country' => $application['current_country'],
                'english_course' => $application['englishCourse'],
                'experience_year' => $application['experienceYear'],
                'cv' => $application['cv'],
                'video_link' => $application['videoLink'],
                'invoice_no' => $invoice_no
            ]);

            Session::put('submitted_application', [
                'data' => $application,
                'invoice_no' => $invoice_no,
                'id' => $submittedApplication->id
            ]);

            Session::forget('application_data');
            Alert::success('Success', 'Application submitted successfully.');
            return redirect()->route('your.application');

            return redirect()->route('homepage');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong. ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function yourApplication()
    {
        try {
            $submitted = Session::get('submitted_application');

            if (!$submitted) {
                Alert::error('Error', 'No application found.');
                return redirect()->route('homepage');
            }

            $application = $submitted['data'];
            $invoice_no = $submitted['invoice_no'];
            $id = $submitted['id'];

            // Job Category নাম আবার বের করুন
            $jobCategoryModel = JobCategory::find($application['jobCategory']);
            $application['jobCategory_name'] = $jobCategoryModel ? $jobCategoryModel->jobCategory : '-';

            return view('frontend.pages.your_application', compact('application', 'invoice_no', 'id'));
        } catch (Exception $e) {
            Alert::error('Error', 'Unable to load your application.');
            return redirect()->route('homepage');
        }
    }
}
