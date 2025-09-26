@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h3 style="font-family: Poppins;" class="mb-3">Edit User</h3>
    <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Login ID</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Username">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-info" style="border-radius: 30px;">Verify</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Pilih Role</option>
                                    <option>Administrator</option>
                                    <option>CXD</option>
                                    <option>Kanwil</option>
                                    <option>SAS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Kantor Wilayah</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Kantor Wilayah 1</option>
                                    <option>Kantor Wilayah 2</option>
                                    <option>Kantor Wilayah 3</option>
                                    <option>Kantor Wilayah 4</option>
                                    <option>Kantor Wilayah 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Outlet Kelolaan</label>
                            <div class="col-sm-9">
                                <select class="form-control outlet-multiple" multiple="multiple" id="outlet_kelolaan" name="outlet[]">
                                    <option>Harmoni [KP]</option>
                                    <option>Palmerah [KC]</option>
                                    <option>Lalala [KP]</option>
                                    <option>Jakarta Barat [KCP]</option>
                                    <option>Tebet [KC]</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Active</option>
                                    <option>Not Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.outlet-multiple').select2({
        placeholder: 'Pilih Outlet Kelolaan',
        allowClear: true,
        searching: true,
        width: '100%'
    });
</script>

@endpush