@extends('user.layout.main')
@section('user')
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
                                <h2 class="text-white">{{ $complete_order->count() }}</h2>
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
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Orders</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_order->count() }}</h2>
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
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
                                                                                                                                                                                            Content body end
@endsection
