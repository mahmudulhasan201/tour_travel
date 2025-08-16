@extends('backend.master')

@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-30">Video</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#!"> <i class="ti-video-camera"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Video</a>
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
                                            <h5 class="mb-0">Edit Video</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="video_url" class="form-label"><strong>Video Url </strong></label>
                                                            <input type="text" name="video_url" id="video_url" class="form-control"
                                                                required value="{{$video->video_url}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                                <small>(please give width="300" & height="200")</small>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Video Status</label>
                                                            <select value="{{ $video->status }}" name="status" class="form-control" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                                <option value="">Select</option>
                                                                <option value="active" {{$video->status == 'active' ? 'selected' : ''}}>active</option>
                                                                <option value="inactive" {{$video->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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