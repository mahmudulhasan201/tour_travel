<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    public function applicationView(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Application::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($row) {
                        return '<img width="100" src="' . $row->image_url . '" class="h-14 w-14 rounded-full object-contain" alt="Image">';
                    })
                    ->addColumn('action', function ($row) {
                        $viewUrl = route('admin.application.view.details', $row->id);
                        $approveUrl = route('admin.application.approve', $row->id);
                        $rejectUrl = route('admin.application.reject', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $viewUrl . '" class="view btn btn-info btn-sm">View</a> ';

                        if (!in_array(strtolower($row->status), ['approved', 'rejected'])) {
                            $buttons .= '<a href="' . $approveUrl . '" class="btn btn-success btn-sm">Approve</a> ';
                            $buttons .= '<a href="' . $rejectUrl . '" class="btn btn-danger btn-sm">Reject</a> ';
                        }

                        return $buttons;
                    })

                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }

            return view('backend.pages.application.view');
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong.' . $e->getMessage(),
                ], 500);
            }

            Alert::error('Error', 'Something went wrong' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function applicationViewDetails($id)
    {
        $application = Application::with('jobCategory')->find($id);
        // dd($application);
        return view('backend.pages.application.view_details', compact('application'));
    }


    public function approve($id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->status = 'approved';
            $application->save();

            Alert::success('Approved', 'Application has been approved successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', 'Failed to approve application: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function reject($id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->status = 'rejected';
            $application->save();

            Alert::success('Rejected', 'Application has been rejected successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', 'Failed to reject application: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
