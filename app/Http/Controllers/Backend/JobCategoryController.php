<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class JobCategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = JobCategory::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($row) {
                        $editUrl = route('admin.jobcategory.edit', $row->id);
                        $deleteUrl = route('admin.jobcategory.destroy', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="view btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';



                        return $buttons;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }

            $jobCategory = JobCategory::all();
            return view('backend.pages.job_category.index', compact('jobCategory'));
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

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $checkValidation = Validator::make($request->all(), [
                'jobCategory'   => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            JobCategory::create([
                'jobCategory' => $request->jobCategory,
                'status' => $request->status,
            ]);

            Alert::success('Success', "Created Successfully.");
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while creating this form . ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $jobCategory = JobCategory::findOrFail($id);
            return view('backend.pages.job_category.edit', compact('jobCategory'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Item-Use edit page.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateJobCategory = JobCategory::findOrFail($id);

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'jobCategory' => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $data = [];

            if ($request->filled('jobCategory')) {
                $data['jobCategory'] = $request->jobCategory;
            }

            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }

            if (!empty($data)) {
                $updateJobCategory->update($data);
            }

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('admin.jobcategory.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('admin.jobcategory.index');
        }
    }


    //Delete
    public function destroy($id)
    {
        try {

            $deleteJobCategory = JobCategory::find($id);
            $deleteJobCategory->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
