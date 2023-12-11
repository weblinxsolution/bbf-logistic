@extends('admin.layout.main')
@section('admin')
    <style>
        .orderstatus {
            color: #939393;
            display: block;
            padding: 1em 0;
            position: relative;
            text-align: center;
            /*min-height: 150px;*/
            transform: translateX(-38%);
        }

        .orderstatus.done:before {
            background: #32841f;

        }

        .orderstatus:before {
            content: '';
            height: 100%;
            position: absolute;
            left: 50%;
            width: 2px;
            background: #939393;
            margin: 0 25px;
        }

        .orderstatus:last-child:before {
            height: 0;
        }

        .orderstatus.done {
            color: #333;
        }

        @media only screen and (max-width: 40em) {
            .orderstatus {
                text-align: left;
            }

            .orderstatus:before {
                left: 0;
            }

            .orderstatus .orderstatus-text {
                left: 0;
                width: 100%;
            }
        }

        .orderstatus-text {
            position: relative;
            width: 100%;
            left: 50%;
            text-align: left;
            padding-left: 60px;
        }

        @media only screen and (min-width: 40em) {
            .orderstatus:nth-child(2n) .orderstatus-text {
                position: relative;
                width: 50%;
                left: 50%;
                text-align: left;
                padding-left: 60px;

            }
        }

        .orderstatus-container {
            padding: 2em 0;
        }

        .orderstatus time {
            display: block;
            font-size: 1em;
            color: #939393;
        }

        .orderstatus.done time {
            color: #368d22;
        }

        .timeline-css {
            padding-left: 2rem;
            margin-top: -.5rem;
        }

        .orderstatus:hover .copy_content {
            display: block;
        }

        .copy_content {
            display: none;
            position: absolute;
            top: 16%;
            left: 50%;
            z-index: 100;
            background-color: #FFF;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            width: max-content;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .copy_content button {
            display: block;
            margin-left: auto;
        }

        @media only screen and (max-width: 40em) {
            .orderstatus-container {
                text-align: center;
            }
        }

        .orderstatus-check {
            font-family: "Helvetica", Arial, sans-serif;
            border: 2px solid #939393;
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            line-height: 48px;
            border-radius: 50%;
            margin-bottom: 0.5em;
            background: #fff;
            z-index: 2;
            position: absolute;
            color: #939393;
            left: 50%;
        }

        .done .orderstatus-check {
            color: #368d22;
            border-color: #368d22;
        }

        @media only screen and (max-width: 40em) {
            .orderstatus-check {
                left: 0;
            }
        }

        .orderstatus-active {
            text-align: center;
            position: relative;
            left: 25px;
            top: 20px;
            color: #939393;
        }

        @media only screen and (max-width: 40em) {
            .orderstatus-active {
                display: none;
            }
        }
    </style>


    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Order Tracking</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order Tracking</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Orders </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- @dd($orders) --}}
                            @if (!isset($invoice))
                                <form action="{{ Route('admin.orderTrackingDb') }}" method="GET">
                                    @csrf
                                    <div class="d-flex align-items-center" style="gap:20px;">
                                        <h4 class="card-title mb-0"><i class="fa fa-shopping-bag fa-lg mr-2"></i> Order
                                            Tracking
                                        </h4>
                                        <div class="d-flex">
                                            <input type="text" class="mr-2 d-flex form-control"
                                                placeholder="Enter Your Invoice Number" name="invoice">
                                            <button type="submit"
                                                class="btn btn-dark d-flex align-items-center">Go</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                            @isset($orders)
                                <div class="row">
                                    <div class=" col-lg-6">
                                        <div class="basic-form pt-4">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Invoice Number:</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" placeholder="Invoice Number"
                                                            value="{{ $orders->invoice_no }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Shipper name:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Shipper name"
                                                            value="{{ $orders->shipper_name }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Consignee name:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Consignee name"
                                                            value="{{ $orders->consignee_name }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Cargo status:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Cargo status"
                                                            value="{{ $orders->orderStatus[0]->status_type }}" readonly>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-2 col-form-label">Size of booking:</label>
                                                    <div class="col-sm-10">
                                                        <div readonly>
                                                            {{-- @foreach ($orders->containers as $con)
                                                                @php
                                                                    $bookingSize = App\Models\BookingSize::find($con->booking_size_id);
                                                                @endphp
                                                                <span class="badge badge-success text-white mb-1"
                                                                    style="font-size: 12px;">{{ $bookingSize->booking_size }}</span>
                                                            @endforeach --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-2 col-form-label">Remark:</label>
                                                    <div class="col-sm-10">
                                                        <textarea rows="3" class="form-control" value="1x20’ Container Truck" readonly>{{ $orders->customer_remark }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Order Type:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Import"
                                                            value="{{ $orders->ordersType[0]->main_type }}" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class=" col-lg-6">
                                        <div class="row orderstatus-container w-100">
                                            <div class="medium-12 columns w-100">
                                                @isset($tracking)
                                                    @foreach ($tracking as $track)
                                                        <div class="orderstatus ">
                                                            <div class="orderstatus-check"><span
                                                                    class="orderstatus-number">{{ $loop->iteration }}</span>
                                                            </div>
                                                            <div class="orderstatus-text">
                                                                <time>{{ $track->created_order_date }}</time>
                                                                <div class = "d-flex ">
                                                                    @php
                                                                        $status = App\Models\OrderStatus::where('id', $track->order_status_id)->first();
                                                                    @endphp
                                                                    <h4>{{ $status->status_type }}</h4>
                                                                    @if ($track->cargo_remark != null)
                                                                        <div class="d-flex align-items-center timeline-css">
                                                                            <a href="{{ asset('documents/' . $track->document) }}"
                                                                                class="btn btn-dark d-block w-100  my-1"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                title="View"><i class="fa-regular fa-eye"></i></a>
                                                                            <a href="{{ asset('documents/' . $track->document) }}"
                                                                                download
                                                                                class="ml-2 btn btn-dark d-block w-100 my-1"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                title="download"><i
                                                                                    class="fa-solid fa-download"></i></a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                {{-- @php

                                                                    $result = DB::table('checks')
                                                                        ->select('container_id', DB::raw('COUNT(*) as `check`'))
                                                                        ->where('order_id', "$track->order_id")
                                                                        ->where('status_id', "$track->status_id")
                                                                        ->where('updated_at', '=', "$track->updated_at")
                                                                        ->whereDate('created_order_date', $track->created_order_date)
                                                                        ->groupBy('container_id')
                                                                        ->get();
                                                                    // dd($result);
                                                                @endphp --}}
                                                                {{-- @if ($track->cargo_remark != null)
                                                                    @foreach ($result as $container_data)
                                                                        <p class="m-0"><span class= "font-weight-bold">Booking
                                                                                size:</span>
                                                                            @php
                                                                                $container_id = App\Models\Containers::where('id', $container_data->container_id)->first();

                                                                                $data = App\Models\BookingSize::where('id', $container_id->booking_size_id)->first();
                                                                            @endphp

                                                                            {{ $data->booking_size }}
                                                                        </p>
                                                                        <p class="m-0"><span class= "font-weight-bold">Booking
                                                                                Quantity:
                                                                            </span>{{ $container_data->check }} Container
                                                                        </p>
                                                                    @endforeach
                                                                @endif --}}

                                                                @php
                                                                    $container = DB::table('checks')
                                                                        ->select('booking_size', DB::raw('COUNT(*) as `check`'))
                                                                        ->where('order_id', "$track->order_id")
                                                                        ->whereDate('created_order_date', $track->created_order_date)
                                                                        ->where('status_id', "$track->order_status_id")
                                                                        ->where('status', '1')
                                                                        ->groupBy('booking_size')
                                                                        ->get();
                                                                    // $container = DB::raw("SELECT booking_size, COUNT(*) AS `check` FROM checks
//             WHERE order_id = $track->order_id AND status_id = $track->order_status_id");
                                                                @endphp


                                                                @if ($track->cargo_remark != null)
                                                                    @foreach ($container as $con)
                                                                        <p class="m-0"><span class= "font-weight-bold">Booking
                                                                                size:</span>
                                                                            {{ $con->booking_size }}
                                                                        </p>
                                                                        <p class="m-0"><span class= "font-weight-bold">Booking
                                                                                Quantity:
                                                                            </span>{{ $con->check }} Container
                                                                        </p>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            @if ($track->cargo_remark != null)
                                                                <div class="copy_content">
                                                                    <p>{{ $track->cargo_remark }}</p>
                                                                    <button
                                                                        class="btn btn-primary btn-sm btn_copy myBtn{{ $track->id }}"
                                                                        onclick="myFunction{{ $track->id }}()"><i
                                                                            class="fa fa-copy"></i> Copy</button>

                                                                    <input type="hidden" value="{{ $track->cargo_remark }}"
                                                                        class="myText{{ $track->id }}">
                                                                </div>
                                                            @endif

                                                            <script>
                                                                $('.myBtn{{ $track->id }}').click(function() {
                                                                    // Get the text field
                                                                    var copyText = $(".myText{{ $track->id }}");

                                                                    // Select the text inside the text field
                                                                    copyText.select();
                                                                    copyText[0].setSelectionRange(0, 99999); // For mobile devices

                                                                    try {
                                                                        // Copy the text inside the text field
                                                                        document.execCommand("copy");
                                                                        // If successful, alert the user
                                                                        alert("Copied the text: " + copyText.val());
                                                                    } catch (err) {
                                                                        // If copying failed, handle the error
                                                                        console.error('Unable to copy text: ', err);
                                                                    }
                                                                });
                                                            </script>

                                                        </div>
                                                    @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <!-- <div class="modal fade" id="basicModal">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div> -->
        <!-- #/ container -->
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
@endsection
