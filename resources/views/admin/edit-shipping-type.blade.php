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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
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
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ Route('admin.editShippingTypeDb', ['id' => $shippingType->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Main Type</label>
                                            <input class="form-control" id=""
                                                value="{{ $shippingType->main_type }}" required name="main_type">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Status</label>
                                            <select class="form-control" id="" required name="status">
                                                <option value="" selected>Choose Type</option>
                                                <option value="1" {{ $shippingType->status == '1' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0" {{ $shippingType->status == '0' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Choose Color</label>
                                            <input type="color" value="{{ $shippingType->color }}" class="form-control"
                                                required name="color">
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Save Changes</button>
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
