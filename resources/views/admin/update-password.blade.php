@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                    Content body start
                                ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col">
                <h4 class="card-title">Update Password</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Update Password</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Item</a></li>
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
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Old Passwprd</label>
                                            <input type="text" class="form-control" placeholder="BBF123">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>New Password</label>
                                            <input type="text" class="form-control" placeholder="Enter New Password">
                                        </div>

                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Save</button>
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
