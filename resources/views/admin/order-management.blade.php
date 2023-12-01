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
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ Route('admin.addOrder') }}" class="btn btn-primary">Add Item</a>
                            </div>
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
                                                        <button type="submit" class="btn btn-dark w-75 my-1"><i
                                                                class="fa-regular fa-eye"></i></button>
                                                        <button type="submit" class="ml-2 btn btn-dark  W-100"><i
                                                                class="fa-solid fa-file-arrow-down"></i></button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#Add_status">Add Status</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex algin-items-center">
                                                        <a href="{{ Route('admin.editOrder', ['id' => $order->id]) }}"
                                                            class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil "></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $order->shipper_name }}</td>
                                                <td>{{ $order->consignee_name }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td><a href="order-tracking.php">{{ $order->invoice_no }}</a></td>
                                                <td>{{ $order->status_name }}</td>
                                                <td>{{ $order->booking_size }}</td>
                                                <td>{{ $order->admin_remark }}</td>
                                                <td>{{ $order->customer_remark }}</td>
                                                <td>{{ $order->added_by }}</td>
                                                <td>{{ $order->pickup_date }}</td>
                                                <td>{{ $order->created_at->format('m-y-d') }}</td>

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
        <div class="modal fade" id="Add_status">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Status</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Order Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>Choose Status</option>
                                        <option value="1">Order Created</option>
                                        <option value="2">Cargo Picked up</option>
                                        <option value="3">Custom Clearance(Thailand)</option>
                                        <option value="4">Custom Clearance(Malaysia)</option>
                                        <option value="5">Padang Besar Depot </option>
                                        <option value="66">Out for Delivery </option>
                                        <option value="67">Cargo Delivered</option>
                                        <option value="69">Order Pickup</option>
                                        <option value="70">Cargo Pickup today </option>
                                        <option value="73">Customs Clearance (Singapore)</option>
                                        <option value="75">Bukit Kayu Hitam Depot</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="date">
                                </div>

                                <!-- <div class="form-group col-md-12">-->
                                <!--    <label>Booking Size</label>-->
                                <!--    <select name="" id="" class="form-control">-->
                                <!--            <option value="" selected>Choose Status</option>-->
                                <!--            <option value="1">1x40’ Container Truck</option>-->
                                <!--            <option value="1">1x20’ Container Truck</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!-- <div class="form-group col-md-12">-->
                                <!--    <label>Quantity</label>-->
                                <!--    <input type="number" value="0" class="form-control">-->
                                <!--</div>-->


                                <label>Booking Size</label>
                                <div class="form-group col-md-12">

                                    <input type="text" class="form-control" disabled value="1x20’ Container Truck">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Each Check Count one</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">

                                    <input type="checkbox" class="">
                                </div>



                                <div class="form-group col-md-12">

                                    <input type="text" class="form-control" disabled value="1x40’ Container Truck">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Each Check Count one</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>



                                <div class="form-group col-md-12">

                                    <input type="text" class="form-control" disabled value="1x80’ Container Truck">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Each Check Count one</label>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="" style="border:outline">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">

                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="form-group col-md-1">

                                    <input type="checkbox" class="">
                                </div>
                                <!--<div class="form-group col-md-3">-->
                                <!--    <label>Total Quantity</label>-->
                                <!--    <input type="number" value="4" class="form-control" disabled>-->
                                <!--</div>-->
                                <!--<div class="form-group col-md-3">-->
                                <!--    <label>Quantity</label>-->
                                <!--    <input type="number" value="0" class="form-control">-->
                                <!--</div>-->


                                <div class="form-group col-md-12">
                                    <label>File upload</label>
                                    <input type="file" class="form-control" style="border:none">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Cargo Remark</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-dark">UPDATE</button>
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
