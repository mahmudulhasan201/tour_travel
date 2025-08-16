@extends('backend.master')

@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-30">Job category</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#!"> <i class="ti-menu-alt"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Job category</a>
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
                                            <h5 class="mb-0">Edit Job category</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.jobcategory.update', $jobCategory->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="jobCategory" class="form-label"><strong>Job Category </strong></label>
                                                            <input type="tetx" name="jobCategory" id="jobCategory" class="form-control"
                                                                required value="{{$jobCategory->jobCategory}}"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select value="{{ $jobCategory->status }}" name="status" class="form-control" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                                <option value="">Select</option>
                                                                <option value="active" {{$jobCategory->status == 'active' ? 'selected' : ''}}>active</option>
                                                                <option value="inactive" {{$jobCategory->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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