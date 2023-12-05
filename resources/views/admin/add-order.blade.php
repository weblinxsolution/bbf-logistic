@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Add Order</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Order</a></li>
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
                                <form action="{{ Route('admin.addOrderDb') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Order Created Date</label>
                                            <input type="date" class="form-control" name="create_date" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pickup Date</label>
                                            <input type="date" class="form-control" name="pickup_date" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Invoice no</label>
                                            <input type="number" class="form-control" placeholder="Invoice no"
                                                name="invoice_no" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Shipper name </label>
                                            <input type="text" class="form-control" placeholder="Shipper name"
                                                name="shipper_name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Consignee name </label>
                                            <input type="text" class="form-control" placeholder="Consingee name"
                                                name="consignee_name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email </label>
                                            <select class="form-control" name="user_email" required>
                                                <option value="" selected>Choose Email</option>
                                                @isset($users)
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Order type</label>
                                            <select class="form-control" name="order_type" required>
                                                <option value="" selected>Choose Type</option>
                                                @isset($ordertType)
                                                    @foreach ($ordertType as $type)
                                                        <option value="{{ $type->id }}">{{ $type->main_type }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Name</label>
                                            <select class="form-control" name="status_name" required>
                                                <option value="" selected>Choose Type</option>
                                                @isset($orderStatus)
                                                    @foreach ($orderStatus as $status)
                                                        <option value="{{ $status->id }}">{{ $status->status_type }}
                                                        </option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="w-100 d-flex justify-content-end">
                                            <button class="btn btn-danger" type="button" onclick="appendDiv()"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="row w-100 mx-0">
                                            <div class="form-group col-md-6">
                                                <label>Booking size</label>
                                                <select class="form-control" name="booking_size[]" required>
                                                    <option value="" selected>Choose Type</option>
                                                    @isset($bookingSize)
                                                        @foreach ($bookingSize as $size)
                                                            <option value="{{ $size->id }}">{{ $size->booking_size }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Quantity</label>
                                                <input type="number" value="1" class="form-control"
                                                    placeholder="Admin remark" name="quantity[]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Admin remark </label>
                                                <input type="text" class="form-control" placeholder="Admin remark"
                                                    name="admin_remark[]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Customer remark</label>
                                                <input type="text" class="form-control" placeholder="Customer remark"
                                                    name="customer_remark[]" required>
                                            </div>
                                        </div>
                                        <div class="row w-100 mx-0" id="append_here"></div>
                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Add Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************Content body end***********************************-->
    <script>
        function appendDiv() {
            var html = `
                    <div class="row w-100 mx-0">
                        <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-danger" type="button" onclick="remove(this)"><i class="fa fa-trash"></i></button>
                         </div>
                                            <div class="form-group col-md-6">
                                                <label>Booking size</label>
                                                <select class="form-control" name="booking_size[]" required>
                                                    <option value="" selected>Choose Type</option>
                                                    @isset($bookingSize)
                                                        @foreach ($bookingSize as $size)
                                                            <option value="{{ $size->id }}">{{ $size->booking_size }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Quantity</label>
                                                <input type="number" value="1" class="form-control"
                                                    placeholder="Admin remark" name="quantity[]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Admin remark </label>
                                                <input type="text" class="form-control" placeholder="Admin remark"
                                                    name="admin_remark[]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Customer remark</label>
                                                <input type="text" class="form-control" placeholder="Customer remark"
                                                    name="customer_remark[]" required>
                                            </div>
                                        </div>
                `;
            $('#append_here').append(html);
        }

        function remove(box) {
            box.parentNode.parentNode.remove();
        }
    </script>
@endsection
