@extends('backend.master')

@section('content')
<div style="padding:20px">
    <h1>Service List</h1>
    <div><a href="{{route('admin.service.form')}}" class="btn btn-primary">Create New Service</a></div>
    <br>
    <table class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Service Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


            <tbody>


            </tbody>
        </table>
</div>
@endsection