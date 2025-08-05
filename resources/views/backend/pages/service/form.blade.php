@extends('backend.master')

@section('content')
<div style="padding: 20px;">

    <div style="padding:10px;">
        <a href="{{ route('admin.service.list') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.service.form') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <h1><strong>Service Create Form</strong></h1><br>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><strong>Event Name</strong></label>
                        <input required name="event_name" type="text" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"><strong>Service Name</strong></label>
                        <input required name="service_name" type="text" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for=""><strong>Service Image</strong></label>
                        <input name="service_image" type="file" class="form-control" id="" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for=""><strong>Description</strong></label>
                        <input name="description" type="number" class="form-control" id="" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for=""><strong>Special</strong></label>
                        <input name="description" type="number" class="form-control" id="" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for="status"><strong>Status</strong></label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div><br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection