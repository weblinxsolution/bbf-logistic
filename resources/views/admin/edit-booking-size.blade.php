@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col">
                <h4 class="card-title">{{ $title }}</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Booking Size</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
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
                                <form action="{{ Route('admin.editBookingSizeDb', ['id' => $bookingSize->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="mt-3">Booking Size</label>
                                        </div>
                                        <div class="form-group col-md-10">

                                            <input type="text" class="form-control" placeholder="Booking Size"
                                                value="{{ $bookingSize->booking_size }}" name="booking_size">
                                        </div>

                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">{{ $title }}</button>
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
