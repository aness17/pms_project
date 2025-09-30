@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-between mb-2 align-items-center page-header">
        <div class="col">
            <h3 class="page-title mb-3">Role Management</h3>
        </div>
        <div class="col text-end">
            <button type="submit" class="btn btn-add btn-rounded btn-lg"><span style="font-size: 15px;font-weight: bold;">Add New Role</span></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Login ID</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Kantor Wilayah</th>
                                    <th>Outlet Kelolaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Herman Beck</td>
                                    <td>Herman Beck</td>
                                    <td>Herman Beck</td>
                                    <td>Herman Beck</td>
                                    <td>Herman Beck</td>
                                    <td>
                                        <a href=""><i class="mdi mdi-lead-pencil"></i></a>
                                        <a href="" type="button" onclick="return confirm('Are you sure to delete this row ?')"><i class="mdi mdi-delete mdi-lg"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-3'<'col-sm-12 col-md-10'i><'col-sm-12 col-md-2 text-right'p>>",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
    });
</script>


@endpush