<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GlobalOffice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class GlobalOfficeController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = GlobalOffice::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()


                    ->addColumn('action', function ($row) {
                        $editUrl = route('admin.offices.edit', $row->id);
                        $deleteUrl = route('admin.offices.destroy', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="view btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';



                        return $buttons;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }

            $globals = GlobalOffice::all();
            return view('backend.pages.globalOffice.index', compact('globals'));
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
                'country' => 'required|string',
                'city' => 'required|string',
                'office_address' => 'required|string',
                'map_link' => 'nullable|string',
                'video_link' => 'nullable|string',
                'contacts' => 'nullable|array',
            ]);

            // $checkValidation['contacts'] = json_encode($request->contacts);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            GlobalOffice::create([
                'country' => $request->country,
                'city' => $request->city,
                'office_address' => $request->office_address,
                'map_link' => $request->map_link,
                'video_link' => $request->video_link,
                'contacts'       => $request->contacts, // <-- no json_encode
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
            $office = GlobalOffice::findOrFail($id);
            return view('backend.pages.globalOffice.edit', compact('office'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading this edit page.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateOffice = GlobalOffice::findOrFail($id);

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'country' => 'required|string',
                'city' => 'required|string',
                'office_address' => 'required|string',
                'map_link' => 'nullable|string',
                'video_link' => 'nullable|string',
                'contacts' => 'nullable|array',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $data = [];

            if ($request->filled('country')) {
                $data['country'] = $request->country;
            }

            if ($request->filled('city')) {
                $data['city'] = $request->city;
            }

            if ($request->filled('office_address')) {
                $data['office_address'] = $request->office_address;
            }

            if ($request->filled('map_link')) {
                $data['map_link'] = $request->map_link;
            }

            if ($request->filled('video_link')) {
                $data['video_link'] = $request->video_link;
            }

            if ($request->filled('contacts')) {
                $data['contacts'] = $request->contacts; // <-- no json_encode
            }


            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }

            if (!empty($data)) {
                $updateOffice->update($data);
            }

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('admin.offices.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('admin.offices.index');
        }
    }


    //Delete
    public function destroy($id)
    {
        try {

            $deleteOffice = GlobalOffice::find($id);

            $deleteOffice->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
