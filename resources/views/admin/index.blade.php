@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Order Delivered</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">65</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">In Transit</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">41</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Order</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">51</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Booking Size</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">25</h2>
                                <p class="text-white mb-0">Jan - March 2019</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">

                                        </div>
                                        <div class="form-group col-md-1">
                                            <input type="date" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <input type="date" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <select class="form-control">
                                                <option>Select main type</option>
                                                <option>Import</option>
                                                <option>Export</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <button type="submit" class="btn btn-dark d-block w-100 h-100">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configurations">
                                    <thead>
                                        <tr>
                                            <th>PICKUP DATE </th>
                                            <th>INVOICE NO.</th>
                                            <th>TRANSIT TIME</th>
                                            <th>STORAGE DAY </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>01-12-2023</td>
                                            <td><a href="order-tracking.php">3234215435</a></td>
                                            <td>5 days</td>
                                            <td>2 days</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>

        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************  ***********************************-->
@endsection
