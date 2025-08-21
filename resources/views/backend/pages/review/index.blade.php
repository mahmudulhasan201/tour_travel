@extends('backend.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-30">Review</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#!"> <i class="ti-comments"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Review</a>
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
                                            <h5 class="mb-0">Review</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.review.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="name" class="form-label"><strong>Reviewer Name</strong></label>
                                                            <input type="text" name="name" id="name" class="form-control"
                                                                placeholder="Enter Reviewer Name"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="image" class="form-label"><strong>Reviewer Image</strong></label>
                                                            <input type="file" name="image" id="image" class="form-control"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="review" class="form-label"><strong>Review</strong></label>
                                                            <input type="text" name="review" id="review" class="form-control"
                                                                placeholder="Enter Customer Review"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
                                                        </div>


                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select name="status" class="form-control"
                                                                style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;" required>
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
                                    <h5 class="mb-0 text-white">Review List</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered data-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Reviewer Name</th>
                                                <th scope="col">Reviewer Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
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
            ajax: "{{ route('admin.review.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'image',
                    name: 'image'
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
        if (confirm("Are you sure you want to delete this Video?")) {
            window.location.href = "{{ route('admin.review.destroy', '') }}/" + userId;
        }
    });
</script>
@endpush