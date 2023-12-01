@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                            Content body start
                        ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Order History</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order History</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Items </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ACTION</th>
                                            <th>STATUS NAME</th>
                                            <th>INVOICE NO</th>
                                            <th>SHIPPER NAME</th>
                                            <th>CONSINGEE NAME</th>
                                            <th>CARGO REMARKS</th>
                                            <th>UPDATE DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12</td>
                                            <td>
                                                <div class="d-flex algin-items-center">
                                                    <a href="{{ Route('admin.editOrder') }}"
                                                        class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil "></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Cargo Picked Up</td>
                                            <td><a href="order-tracking.php">3234215435</a></td>
                                            <td>Hitachi Astemo, Chonburi</td>
                                            <td>Armstrong Auto Parts, Melaka</td>
                                            <td>1.Truck no :71-3715/71-5344 Dr.</td>
                                            <td>11/22/2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Slip</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="https://www.pngkey.com/png/full/747-7471926_rental-payment-receipt-template-main-image.png"
                            class="w-100 img-fluid" alt="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
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
