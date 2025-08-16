@extends('backend.master')

@section('content')
<div class="pcoded-content">

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
                            <a href="#!"> <i class="ti-image"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Gallery</a>
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
                                            <h5 class="mb-0 text-center"> Create a Photo Gallery</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="d-flex justify-content-center align-items-center min-vh-100">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="form-group mb-3">
                                                                    <label for="name" class="form-label"><strong>Gallery Name</strong></label>
                                                                    <input type="text" name="name" id="name" class="form-control"
                                                                        placeholder="Enter Gallery Name" required
                                                                        style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="image" class="form-label"><strong>Images</strong></label>
                                                                    <input type="file" name="images[]" id="image" class="form-control" multiple
                                                                        style="border: 2px solid #28a745; border-radius: 6px; padding: 8px 12px;">
                                                                    <small class="text-muted">Hold Ctrl (or Cmd) to select multiple images.</small>
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
                                    <h5 class="mb-0 text-white">Gallery List</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered data-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="5%">ID</th>
                                                <th scope="col" width="10%">Gallery Name</th>
                                                <th scope="col" width="10%"> Gallery Status</th>
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
            ajax: "{{ route('admin.gallery.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
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
        if (confirm("Are you sure you want to delete this gallery?")) {
            window.location.href = "{{ route('admin.gallery.destroy', '') }}/" + userId;
        }
    });
</script>
@endpush