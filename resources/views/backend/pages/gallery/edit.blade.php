@extends('backend.master')

@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-30">Gallery</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#!"> <i class="ti-gallery"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Gallery</a>
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
                                            <h5 class="mb-0">Edit Gallery</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="name" class="form-label"><strong>Gallery Name </strong></label>
                                                            <input type="text" name="name" id="name" class="form-control"
                                                                required value="{{$gallery->name}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Gallery Status</label>
                                                            <select value="{{ $gallery->status }}" name="status" class="form-control" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                                <option value="">Select</option>
                                                                <option value="active" {{$gallery->status == 'active' ? 'selected' : ''}}>active</option>
                                                                <option value="inactive" {{$gallery->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                                            </select>
                                                        </div>


                                                        {{-- Upload New Images --}}
                                                        <div class="form-group mb-3">
                                                            <label for="images" class="form-label"><strong>Add New Images</strong></label>
                                                            <input type="file" name="images[]" id="images" class="form-control" multiple
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        {{-- Existing Images Preview --}}
                                                        <div class="form-group mb-3">
                                                            <label class="form-label"><strong>Existing Images</strong></label>
                                                            <div>
                                                                @foreach(json_decode($gallery->images) as $img)
                                                                <div style="display:inline-block; position:relative; margin:5px;">
                                                                    <img src="{{ asset('images/'.$img) }}" width="100" class="img-thumbnail">
                                                                    <label style="display:block; text-align:center;">
                                                                        <input type="checkbox" name="remove_images[]" value="{{ $img }}"> Remove
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>
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