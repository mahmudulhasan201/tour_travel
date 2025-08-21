@extends('backend.master')

@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-30">Global Office</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#!"> <i class="ti-world"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Global Office</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="container">
                            <div class="row justify-content-center">

                                <div class="col-md-10 mb-4">
                                    <div class="shadow-sm">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">Edit Office</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.offices.update', $office->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="country" class="form-label"><strong>Country</strong></label>
                                                            <input type="text" name="country" id="country" class="form-control"
                                                                required value="{{$office->country}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="city" class="form-label"><strong>City</strong></label>
                                                            <input type="tetx" name="city" id="city" class="form-control"
                                                                required value="{{$office->city}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="office_address" class="form-label"><strong>Office Address</strong></label>
                                                            <input type="text" name="office_address" id="office_address" class="form-control"
                                                                required value="{{$office->office_address}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="map_link" class="form-label"><strong>Map Link</strong></label>
                                                            <input type="text" name="map_link" id="map_link" class="form-control"
                                                                required value="{{$office->map_link}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="video_link" class="form-label"><strong>Video Link</strong></label>
                                                            <input type="text" name="video_link" id="video_link" class="form-control"
                                                                required value="{{$office->video_link}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label"><strong><i class="ti-mobile"></i> Contacts</strong></label>

                                                            @if(!empty($office->contacts))
                                                            @foreach($office->contacts as $contact)
                                                            <input type="text" name="contacts[]" value="{{ $contact }}"
                                                                class="form-control mb-2"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                            @endforeach
                                                            @endif

                                                            <!-- Optionally add one blank input for new number -->
                                                            <input type="text" name="contacts[]" value=""
                                                                class="form-control mb-2"
                                                                placeholder="Enter another contact number"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>


                                                        <div class="form-group mb-3">
                                                            <label class="form-label"> Status</label>
                                                            <select value="{{ $office->status }}" name="status" class="form-control" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                                <option value="">Select</option>
                                                                <option value="active" {{$office->status == 'active' ? 'selected' : ''}}>active</option>
                                                                <option value="inactive" {{$office->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                {{-- Center Button --}}
                                                <div class="text-center mt-3">
                                                    <button type="submit" class="btn btn-success px-5">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection