@extends('backend.master')

@section('content')
<div style="padding:20px">
    <h1>Event List</h1>
    <div><a href="{{route('admin.event.form')}}" class="btn btn-primary">Create New Event</a></div>
    <br>
    <table class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


            <tbody>


            </tbody>
        </table>
</div>
@endsection