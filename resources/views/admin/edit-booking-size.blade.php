@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                    Content body start
                                                ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col">
                <h4 class="card-title">Edit Booking Size</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit booking Size</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Booking Size</a></li>
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
                                        <div class="form-group col-md-2">
                                            <label class="mt-3">Book Size</label>

                                        </div>
                                        <div class="form-group col-md-10">

                                            <input type="text" class="form-control" placeholder="Booking Size">
                                        </div>

                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Save</button>
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
