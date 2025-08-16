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
                        <li class="breadcrumb-item"><a href="#!">View Gallery</a>
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
                                            <h5 class="mb-0">{{$gallery->name}}</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    {{-- Existing Images Preview --}}
                                                    <div class="form-group mb-3">
                                                        <div>
                                                            @foreach(json_decode($gallery->images) as $img)
                                                            <div style="display:inline-block; position:relative; margin:5px;">
                                                                <img src="{{ asset('images/'.$img) }}" width="200" height="200" class="img-thumbnail">
                                                            </div>
                                                            @endforeach
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
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection