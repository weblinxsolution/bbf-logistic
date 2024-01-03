@extends('user.layout.main')
@section('user')
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
                            <form action="{{ Route('user.orderTrackingDb') }}" method="POST" class="mb-4">
                                @csrf
                                <div class="d-flex align-items-center" style="gap:20px;">
                                    <h4 class="card-title mb-0"><i class="fa fa-shopping-bag fa-lg mr-2"></i> Order
                                        Tracking
                                    </h4>
                                    <div class="d-flex">
                                        <input type="text" class="mr-2 d-flex form-control"
                                            placeholder="Enter Your Invoice Number" name="invoice">
                                        <button type="submit" class="btn btn-dark d-flex align-items-center">Go</button>
                                    </div>
                                </div>
                            </form>
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
                        </div>
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
@endsection
