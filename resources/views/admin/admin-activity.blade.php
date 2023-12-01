@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                Content body start
                            ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Order Management</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Orders </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ACTION</th>
                                        <th>USER NAME</th>
                                        <th>ACTIVITY</th>
                                        <th>DATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    Delete</a>
                                            </div>
                                        </td>
                                        <td>admin</td>
                                        <td>Logout</td>
                                        <td>2011/01/25</td>
                                    </tr>
                                </tbody>
                            </table>
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
