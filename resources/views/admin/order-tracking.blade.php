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
            left: 60%;
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
                            <div class="d-flex align-items-center" style="gap:20px;">
                                <h4 class="card-title mb-0"><i class="fa fa-shopping-bag fa-lg mr-2"></i> Order Tracking
                                </h4>
                                <div class="d-flex">
                                    <input type="text" class="mr-2 d-flex form-control"
                                        placeholder="Enter Your Invoice Number">
                                    <button class="btn btn-dark d-flex align-items-center">Go</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="basic-form pt-4">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Invoice Number:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" placeholder="Invoice Number"
                                                        value="hammad01" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Shipper name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Shipper name"
                                                        value="ABC Shipper" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Consignee name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Consignee name"
                                                        value="XYZ Consingee" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cargo status:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Cargo status"
                                                        value="Cargo Delivered" readonly>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label class="col-sm-2 col-form-label">Size of booking:</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="3" class="form-control" value="1x20’ Container Truck" readonly>1x20’ Container Truck</textarea>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label class="col-sm-2 col-form-label">Remark:</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="3" class="form-control" value="1x20’ Container Truck" readonly>customer message</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Order Type:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Import"
                                                        value="Import" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="row orderstatus-container w-100">
                                        <div class="medium-12 columns w-100">
                                            <div class="orderstatus done">
                                                <div class="orderstatus-check"><span class="orderstatus-number">1</span>
                                                </div>
                                                <div class="orderstatus-text">
                                                    <time>17 Nov 2023</time>
                                                    <div class = "d-flex ">
                                                        <h4>Custom Clearance (Thailand)</h4>
                                                        <div class="d-flex align-items-center timeline-css">
                                                            <button type="submit" class="btn btn-dark d-block w-100  my-1"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="View"><i class="fa-regular fa-eye"></i></button>
                                                            <button type="submit"
                                                                class="ml-2 btn btn-dark d-block w-100 my-1"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="download"><i
                                                                    class="fa-solid fa-download"></i></button>
                                                        </div>
                                                    </div>
                                                    <p class="m-0"><span class= "font-weight-bold">Booking size:
                                                        </span>1x40’ Container Truck</p>
                                                    <p class="m-0"><span class= "font-weight-bold">Booking Quantity:
                                                        </span>5 Container</p>
                                                </div>
                                                <div class="copy_content">
                                                    <p>lorem to here orderstatus</p>
                                                    <button class="btn btn-primary btn-sm btn_copy"
                                                        onclick="myFunction()"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                            <div class="orderstatus ">
                                                <div class="orderstatus-check"><span class="orderstatus-number">2</span>
                                                </div>
                                                <div class="orderstatus-text">
                                                    <time>20 Nov 2023</time>
                                                    <p>Cargo Picked up</p>
                                                </div>
                                                <div class="copy_content">
                                                    <p>lorem to here orderstatus</p>
                                                    <button class="btn btn-primary btn-sm btn_copy"
                                                        onclick="myFunction()"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                            <div class="orderstatus ">
                                                <div class="orderstatus-check"><span class="orderstatus-number">3</span>
                                                </div>
                                                <div class="orderstatus-text">
                                                    <time>22 Nov 2023</time>
                                                    <p>Cargo Picked up</p>
                                                </div>
                                                <div class="copy_content">
                                                    <p>lorem to here orderstatus</p>
                                                    <button class="btn btn-primary btn-sm btn_copy"
                                                        onclick="myFunction()"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                            <div class="orderstatus ">
                                                <div class="orderstatus-check"><span class="orderstatus-number">4</span>
                                                </div>
                                                <div class="orderstatus-text">
                                                    <time>24 Nov 2023</time>
                                                    <p>Order Created</p>
                                                </div>
                                                <div class="copy_content">
                                                    <input type="text" value="Hello World" class="d-none"
                                                        id="myInput">
                                                    <p>lorem to here orderstatus</p>
                                                    <button class="btn btn-primary btn-sm btn_copy"
                                                        onclick="myFunction()"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function myFunction() {
                // Get the text field
                var copyText = document.getElementById("myInput");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                //   alert("Copied the text: " + copyText.value);
            }
        </script>
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
