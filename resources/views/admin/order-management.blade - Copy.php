@extends('admin.layout.main')
@section('admin')
<!--**********************************Content body start***********************************-->
<style>
    .form-control {
        width: 92.6%;
    }
</style>
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
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ Route('admin.addOrder') }}" class="btn btn-primary">Add Order</a>
                        </div>
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered zero-configuration table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DOCUMENT</th>
                                    <th>CARGO STATUS</th>
                                    <th>ACTION</th>
                                    <th>SHIPPER NAME</th>
                                    <th>CONSINGEE NAME</th>
                                    <th>EMAIL</th>
                                    <th>INVOICE NO</th>
                                    <th>STATUS NAME</th>
                                    <th>BOOKING SIZE</th>
                                    <th>ADMIN REMARK</th>
                                    <th>CUSTOMER REMARK</th>
                                    <th>ADDED BY</th>
                                    <th>PICKUP DATE</th>
                                    <th>ORDER CREATED DATE</th>

                                </tr>
                            </thead>
                            <tbody>

                                @isset($orders)
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('documents/' . $order->document) }}"
                                                class="btn btn-dark w-75 my-1"><i class="fa-regular fa-eye"></i></a>
                                            <a href="{{ asset('documents/' . $order->document) }}" download
                                                class="ml-2 btn btn-dark  W-100"><i
                                                    class="fa-solid fa-file-arrow-down"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#Add_status{{ $order->id }}">Add Status</button>
                                    </td>
                                    <td>
                                        <div class="d-flex algin-items-center">
                                            <a href="{{ Route('admin.editOrder', ['id' => $order->id]) }}"
                                                class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil "></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $order->shipper_name }}</td>
                                    <td>{{ $order->consignee_name }}</td>
                                    <td>
                                        @foreach ($order->users as $user)
                                        {{ $user->email }}
                                        @endforeach
                                    </td>
                                    <td><a href="{{ Route('admin.orderTracking', ['invoice' => $order->invoice_no]) }}">{{
                                            $order->invoice_no }}</a>
                                    </td>
                                    <td>
                                        @foreach ($order->orderStatus as $status)
                                        {{ $status->status_type }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->containers->unique('booking_size_id') as $con)
                                        @php
                                        $bookingSize = App\Models\BookingSize::find($con->booking_size_id);
                                        @endphp
                                        <span class="badge badge-success text-white mb-1" style="font-size: 12px;">{{
                                            $bookingSize->booking_size }}</span>
                                        @endforeach
                                    </td>

                                    <td>
                                        {{ $order->admin_remark }}
                                    </td>
                                    <td>
                                        {{ $order->customer_remark }}
                                    </td>
                                    <td>{{ $order->added_by }}</td>
                                    <td>{{ $order->pickup_date }}</td>
                                    <td>
                                        {{ $order->created_at->format('m-y-d') }}
                                    </td>

                                    <div class="modal fade" id="Add_status{{ $order->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Status</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ Route('admin.updateOrderStatus', ['order_id' => $order->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Order Status</label>

                                                                @php
                                                                $order_type =
                                                                App\Models\OrderStatus::where('main_type_id',
                                                                $order->order_type_id)->get();
                                                                @endphp

                                                                <select id="order_status{{ $order->id }}"
                                                                    name="status_type"
                                                                    class="form-control order_status_" required>
                                                                    <option value="">Choose Status
                                                                    </option>
                                                                    @foreach ($order->orderStatus as $order_check)
                                                                    @foreach ($order_type as $type)
                                                                    <option value="{{ $type->id }}"
                                                                        data-status="{{ $type->status }}"
                                                                        status-name="{{ $type->status }}">
                                                                        {{ $type->status_type }}
                                                                    </option>
                                                                    @endforeach
                                                                    @endforeach
                                                                </select>

                                                                <input type="hidden" value="{{ $order->id }}"
                                                                    class="change_status_value{{ $order->id }}"
                                                                    name="check_status">
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Date</label>
                                                                <input type="date" class="form-control"
                                                                    placeholder="date" name="pickup_date" required>
                                                            </div>


                                                            <div id="append_data{{ $order->id }}"
                                                                class="append_data{{ $order->id }} w-100">

                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>File upload</label>
                                                                <input type="file" class="form-control" name="file"
                                                                    required>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Cargo Remark</label>
                                                                <textarea class="form-control" name="cargo_remark"
                                                                    rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $('#order_status{{ $order->id }}').change(function () {
                                                                var selectedOption = $('option:selected', this);
                                                                var statusName = selectedOption.attr('status-name');
                                                                $('.change_status_value{{ $order->id }}').val(
                                                                    statusName);

                                                                // This script working for ajax
                                                                var status_id = $(this).val();
                                                                var order_id = "{{ $order->id }}";

                                                                $.ajax({

                                                                    url: "{{ Route('admin.orderTrackingAjax') }}",
                                                                    type: 'GET',
                                                                    data: {
                                                                        order_id: order_id,
                                                                        status_id: status_id
                                                                    },
                                                                    success: function (response) {
                                                                        console.log(response);
                                                                        $('#append_data{{ $order->id }}')
                                                                            .empty().append(response);
                                                                    },
                                                                    error: function (error) {
                                                                        console.log('Error:', error);
                                                                    }
                                                                });

                                                            })
                                                        </script>
                                                        <div class="w-100 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-dark mx-2"
                                                                data-dismiss="modal">CLOSE</button>
                                                            <button type="submit" class="btn btn-dark">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #/ container -->
</div>
<!--**********************************Content body end***********************************-->

@endsection