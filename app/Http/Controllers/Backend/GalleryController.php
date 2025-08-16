<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use App\Services\FileUploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    public function gList(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Gallery::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()

                    ->addColumn('images', function ($row) {
                        $images = json_decode($row->images, true);
                        $html = '';

                        if (is_array($images)) {
                            foreach ($images as $img) {
                                $html .= '<img src="' . asset('images/' . $img) . '" 
                        width="80" height="80" 
                        style="object-fit:cover; margin-right:5px; border-radius:4px;">';
                            }
                        }

                        return $html ?: 'No Image';
                    })

                    ->addColumn('action', function ($row) {
                        $editUrl = route('admin.gallery.edit', $row->id);
                        $viewUrl = route('admin.gallery.view', $row->id);
                        $deleteUrl = route('admin.gallery.destroy', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $editUrl . '" class="view btn btn-primary btn-sm">Edit</a> ';

                        $buttons .= '<a href="' . $viewUrl . '" class="view btn btn-secondary btn-sm">View</a> ';

                        $buttons .= '<a href="' . $deleteUrl . '" class="delete btn btn-danger btn-sm">Delete</a>';



                        return $buttons;
                    })

                    ->rawColumns(['images', 'action'])
                    ->make(true);
            }

            $galleries = Gallery::all();
            return view('backend.pages.gallery.index', compact('galleries'));
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
                'name' => 'required|string|max:255',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('gallery', 'public');
                    $imagePaths[] = $path;
                }
            }

            Gallery::create([
                'name' => $request->name,
                'images' => json_encode($imagePaths),
                'status' => $request->status,
            ]);

            Alert::success('Success', "Created Successfully.");
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while creating this form . ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('backend.pages.gallery.view', compact('gallery'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong.' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('backend.pages.gallery.edit', compact('gallery'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while loading the Item-Use edit page.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updateGallery = Gallery::findOrFail($id);
            $existingImages = json_decode($updateGallery->images, true);

            // Remove selected images
            if ($request->filled('remove_images')) {
                foreach ($request->remove_images as $removeImage) {
                    if (($key = array_search($removeImage, $existingImages)) !== false) {
                        unset($existingImages[$key]);
                        Storage::disk('public')->delete($removeImage);
                    }
                }
            }

            // Add new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('gallery', 'public');
                    $existingImages[] = $path;
                }
            }

            // Validation
            $checkValidation = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:active,inactive',
            ]);

            if ($checkValidation->fails()) {
                $errorMessage = $checkValidation->errors()->first();
                Alert::error('Error', $errorMessage);
                return redirect()->back()->withInput();
            }

            $updateGallery->update([
                'name' => $request->name,
                'images' => json_encode(array_values($existingImages)), // reindex array
                'status' => $request->status,
            ]);

            Alert::success('Success', "Updated Successfully.");
            return redirect()->route('admin.gallery.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong while updating this Page. ' . $e->getMessage());
            return redirect()->route('admin.gallery.index');
        }
    }


    // //Delete
    public function destroy($id)
    {
        try {

            $deleteService = Gallery::find($id);
            FileUploadService::deleteFile($deleteService->image, 'images/');

            $deleteService->delete();

            Alert::success('Success', " Deleted Successfully.");
            return redirect()->back();
        } catch (Exception $e) {

            Alert::error('Error', 'Something went wrong while deleting the user. ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
