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
                        <li class="breadcrumb-item"><a href="#!">Global Office</a>
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

                                <div class="col-md-10 mb-4"> {{-- এখন পুরো width নিল --}}
                                    <div class="shadow-sm">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">Create Office Form</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.offices.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    {{-- Left Column --}}
                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="country" class="form-label"><strong>Country Name </strong></label>
                                                            <input type="text" name="country" id="country" class="form-control"
                                                                placeholder="Enter Country" required
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="city" class="form-label"><strong>City</strong></label>
                                                            <input type="text" name="city" id="city" class="form-control"
                                                                placeholder="Enter City" required
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="office_address" class="form-label"><strong>Office Address</strong></label>
                                                            <input type="text" name="office_address" id="office_address" class="form-control"
                                                                placeholder="Enter Address" required
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="map_link" class="form-label"><strong>Map</strong></label>
                                                            <input type="text" name="map_link" id="map_link" class="form-control"
                                                                placeholder="Enter Map link"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                    </div>

                                                    {{-- Right Column --}}
                                                    <div class="col-md-6">



                                                        <div class="form-group mb-3">
                                                            <label for="video_link" class="form-label"><strong>Video </strong></label>
                                                            <input type="text" name="video_link" id="video_link" class="form-control"
                                                                placeholder="Enter Video Link"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="contacts" class="form-label">
                                                                <strong><i class="ti-mobile"></i> Contacts</strong>
                                                            </label>

                                                            <input type="text" name="contacts[]" class="form-control mb-2"
                                                                placeholder="Enter Contact Number" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">

                                                            <input type="text" name="contacts[]" class="form-control mb-2"
                                                                placeholder="Enter Another Contact Number" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">

                                                            <input type="text" name="contacts[]" class="form-control mb-2"
                                                                placeholder="Enter Another Contact Number" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label"><strong>Office Status</strong></label>
                                                            <select name="status" class="form-control" style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                                <option value="">Select</option>
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Center Button --}}
                                                <div class="text-center mt-3">
                                                    <button type="submit" class="btn btn-success px-5">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary">
                                    <h5 class="mb-0 text-white">Office List</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered data-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="5%">ID </th>
                                                <th scope="col" width="15%">Country</th>
                                                <th scope="col" width="15%">City</th>
                                                <th scope="col" width="15%">Address</th>
                                                <th scope="col" width="15%">Map Link</th>
                                                <th scope="col" width="15%">Video Link</th>
                                                <th scope="col" width="15%">Contacts</th>
                                                <th scope="col" width="15%">Status</th>
                                                <th scope="col" width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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

@push('js')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.offices.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'country',
                    name: 'country'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'office_address',
                    name: 'office_address'
                },
                {
                    data: 'map_link',
                    name: 'map_link'
                },
                {
                    data: 'video_link',
                    name: 'video_link'
                },
                {
                    data: 'contacts',
                    name: 'contacts'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });

    //delete
    $('.data-table').on('click', '.delete', function() {
        var userId = $(this).data('id');
        if (confirm("Are you sure you want to delete this?")) {
            window.location.href = "{{ route('admin.offices.destroy', '') }}/" + userId;
        }
    });
</script>
@endpush