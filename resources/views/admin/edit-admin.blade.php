@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col">
                <h4 class="card-title">Edit Admin</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Admin</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ Route('admin.editAdminDb', ['id' => $admin->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name"
                                                value="{{ $admin->admin }}" name="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                value="{{ $admin->number }}" name="number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email"
                                                value="{{ $admin->email }}" name="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password">
                                        </div>

                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                Content body end
                                                                                                                                                                                                                                            ***********************************-->
@endsection
