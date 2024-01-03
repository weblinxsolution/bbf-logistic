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
                                            {{-- <th>ACTION</th> --}}
                                            <th>STATUS NAME</th>
                                            <th>INVOICE NO</th>
                                            <th>SHIPPER NAME</th>
                                            <th>CONSINGEE NAME</th>
                                            <th>CARGO REMARKS</th>
                                            <th>UPDATE DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @foreach ($order->orderStatus as $status)
                                                        {{ $status->status_type }}
                                                    @endforeach
                                                </td>
                                                <td><a
                                                        href="{{ Route('admin.orderTracking', ['invoice' => $order->invoice_no]) }}">{{ $order->invoice_no }}</a>
                                                </td>
                                                <td>{{ $order->shipper_name }}</td>
                                                <td>{{ $order->consignee_name }}</td>
                                                <td>
                                                    @foreach ($order->tracking as $remark)
                                                        <span class="badge badge-success text-white">{{ $remark->cargo_remark }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $order->updated_at->format('d-m-y ') }}
                                                </td>
                                            </tr>
                                        @endforeach
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
