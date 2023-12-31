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
                                {{-- <p class="text-white mb-0">Jan - March 2023</p> --}}
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
                                <h2 class="text-white">{{ $total_booking_size->count() }}</h2>
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
                                <form action="{{ Route('admin.dashboard') }}" method="GET">
                                    <div class="form-row gap-2" style="display: flex; gap:10px;justify-content: end">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="start_date" placeholder="Start Date">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="end_date" placeholder="End Date">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="type">
                                                <option selected disabled>Select main type</option>
                                                @foreach ($shipping_type as $type)
                                                    <option value="{{ $type->id }}">{{ $type->main_type }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="submit" value="submit" id="">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark d-block w-100 h-100">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configurations">
                                    <thead>
                                        <tr>
                                            <th>#SR</th>
                                            <th>PICKUP DATE </th>
                                            <th>INVOICE NO.</th>
                                            <th>TRANSIT TIME</th>
                                            <th>STORAGE DAY </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($complete_order)
                                            @foreach ($complete_order as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($order->pickup_date)->format('d-m-y') }}</td>
                                                    <td><a
                                                            href="{{ Route('admin.orderTracking', ['invoice' => $order->invoice_no]) }}">{{ $order->invoice_no }}</a>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $date1 = \Carbon\Carbon::parse($order->pickup_date);
                                                            $date2 = \Carbon\Carbon::parse($order->final_order_date);
                                                            $diffInDays = $date1->diffInDays($date2);
                                                        @endphp
                                                        {{ $diffInDays }} Days
                                                    </td>
                                                    <td>{{ $order->storage_days }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
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
