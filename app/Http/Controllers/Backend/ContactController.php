<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function viewMessage(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = Contact::query();

                return DataTables::eloquent($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($row) {
                        $viewUrl = route('admin.view.message.details', $row->id);

                        $buttons = '';

                        $buttons .= '<a href="' . $viewUrl . '" class="view btn btn-primary btn-sm">View</a> ';

                        return $buttons;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('backend.pages.contact.index');
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
}
