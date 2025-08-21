<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\FileUploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Review::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($row) {
                        return '<img width="100" src="' . $row->image_url . '" class="h-14 w-14 rounded-full object-contain" alt="Image">';
                    })
                    ->addColumn('action', function ($row) {
                        $editUrl = route('admin.review.edit', $row->id);
                        $deleteUrl = route('admin.review.destroy', $row->id);
                        $viewUrl = route('admin.review.view', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $viewUrl . '" class="view btn btn-info btn-sm">View</a>';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';


                        return $buttons;
                    })

                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }

            $reviews = Review::all();
            return view('backend.pages.review.index', compact('reviews'));
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
                'image'   => 'nullable',
                'review'   => 'required',
                'status'     => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $image = FileUploadService::fileUpload($request->file('image'), '/reviews');

            Review::create([
                'name' => $request->name,
                'image' => $image,
                'review' => $request->review,
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
            $review = Review::findOrFail($id);
            return view('backend.pages.review.edit', compact('review'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong.');
            return redirect()->back();
        }
    }

    public function view($id)
    {
        try {
            $review = Review::findOrFail($id);
            return view('backend.pages.review.view', compact('review'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateReview = Review::findOrFail($id);

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'name'   => 'required',
                'image'   => 'nullable',
                'review'   => 'required',
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

            if ($request->hasFile('image')) {
                $image = FileUploadService::fileUpload($request->file('image'), '/reviews');
                FileUploadService::deleteFile($updateReview->image, 'images/reviews/');
                $data['image'] = $image;
            }

            if ($request->filled('review')) {
                $data['review'] = $request->review;
            }

            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }

            if (!empty($data)) {
                $updateReview->update($data);
            }

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('admin.review.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('video.list');
        }
    }


    //Delete
    public function destroy($id)
    {
        try {

            $deleteReview = Review::find($id);
            $deleteReview->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
