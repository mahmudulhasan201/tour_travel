@extends('backend.master')

@section('content')
    <div style="padding: 20px;">

        <div style="padding:10px;">
            <a href="{{ route('admin.event.list') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <form action="{{ route('admin.event.form') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <h1><strong>Event Create Form</strong></h1><br>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"><strong>Event Name</strong></label>
                            <input required name="event_name" type="text" class="form-control"
                                id="exampleFormControlInput1" placeholder="">
                        </div><br>     

                        <div class="form-group">
                            <label for=""><strong>Event Image</strong></label>
                            <input name="event_image" type="file" class="form-control" id="" placeholder="">
                        </div><br>

                        <div class="form-group">
                            <label for=""><strong>Status</strong></label>
                            <input name="discount" type="text" class="form-control" id="" placeholder="">
                        </div><br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection