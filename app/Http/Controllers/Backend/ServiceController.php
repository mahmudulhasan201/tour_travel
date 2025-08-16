<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\FileUploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function sList(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Service::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($row) {
                        return '<img width="100" src="' . $row->image_url . '" class="h-14 w-14 rounded-full object-contain" alt="Image">';
                    })
                    ->addColumn('action', function ($row) {
                        $editUrl = route('admin.service.edit', $row->id);
                        $deleteUrl = route('admin.service.destroy', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="view btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';



                        return $buttons;
                    })

                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }

            $services = Service::all();
            return view('backend.pages.service.index', compact('services'));
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
                'name'   => 'required',
                'type' => 'required',
                'image'       => 'required',
                'description'   => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $image = FileUploadService::fileUpload($request->file('image'), '/services');

            Service::create([
                'name' => $request->name,
                'type' => $request->type,
                'image' => $image,
                'description' => $request->description,
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
            $service = Service::findOrFail($id);
            return view('backend.pages.service.edit', compact('service'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Item-Use edit page.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateService = Service::findOrFail($id);

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'name'   => 'required',
                'type' => 'required',
                'image'       => 'required',
                'description'   => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $data = [];

            if ($request->filled('name')) {
                $data['name'] = $request->name;
            }

            if ($request->filled('type')) {
                $data['type'] = $request->type;
            }

            if ($request->hasFile('image')) {
                $image = FileUploadService::fileUpload($request->file('image'), '/services');
                FileUploadService::deleteFile($updateService->image, 'images/services/');
                $data['image'] = $image;
            }


            if ($request->filled('description')) {
                $data['description'] = $request->description;
            }

            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }

            if (!empty($data)) {
                $updateService->update($data);
            }

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('admin.service.list');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('admin.service.list');
        }
    }


    //Delete
    public function destroy($id)
    {
        try { 

            $deleteService = Service::find($id);
            FileUploadService::deleteFile($deleteService->image, 'images/services/');

            $deleteService->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
