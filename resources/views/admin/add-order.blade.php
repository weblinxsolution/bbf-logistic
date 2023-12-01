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
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Order Created Date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pickup Date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Invoice no</label>
                                            <input type="number" class="form-control" placeholder="Invoice no">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Shipper name </label>
                                            <input type="text" class="form-control" placeholder="Shipper name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Consingee name </label>
                                            <input type="text" class="form-control" placeholder="Consingee name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email </label>
                                            <select name="" class="form-control">
                                                <option value="" selected>Choose Email</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Order type</label>
                                            <select name="" class="form-control">
                                                <option value="" selected>Choose Type</option>
                                                <option value="">Export</option>
                                                <option value="">Import</option>
                                                <option value="">Order Type3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Name</label>
                                            <select name="" class="form-control">
                                                <option value="" selected>Choose Type</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Booking size</label>
                                            <select name="" class="form-control">
                                                <option value="" selected>Choose Type</option>
                                                <option value="">1x20’ Container Truck</option>
                                                <option value="">1x40’ Container Truck</option>
                                                <option value="">1x80’ Container Truck</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Quantity</label>
                                            <input type="number" value="1" class="form-control"
                                                placeholder="Admin remark">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admin remark </label>
                                            <input type="email" class="form-control" placeholder="Admin remark">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Customer remark</label>
                                            <input type="email" class="form-control" placeholder="Customer remark">
                                        </div>
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
    <!--**********************************
                        Content body end
                    ***********************************-->
@endsection
