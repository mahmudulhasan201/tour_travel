<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Video::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('video_url', function ($row) {
                        return $row->video_url; 
                    })
                    ->addColumn('action', function ($row) {
                        $editUrl = route('video.edit', $row->id);
                        $deleteUrl = route('video.destroy', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="view btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';

                        return $buttons;
                    })

                    ->rawColumns(['action', 'video_url'])
                    ->make(true);
            }

            $videos = Video::all();
            return view('backend.pages.video.index', compact('videos'));
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
                'video_url'   => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            Video::create([
                'video_url' => $request->video_url,
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
            $video = Video::findOrFail($id);
            return view('backend.pages.video.edit', compact('video'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Item-Use edit page.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateVideo = Video::findOrFail($id);

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'video_url' => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $data = [];

            if ($request->filled('video_url')) {
                $data['video_url'] = $request->video_url;
            }

            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }

            if (!empty($data)) {
                $updateVideo->update($data);
            }

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('video.list');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('video.list');
        }
    }


    //Delete
    public function destroy($id)
    {
        try {

            $deleteVideo = Video::find($id);
            $deleteVideo->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
