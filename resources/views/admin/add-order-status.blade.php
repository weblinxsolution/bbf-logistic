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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Item</a></li>
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
                                <form action="{{ Route('admin.addOrderStatusDb') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Main Type</label>
                                            <select class="form-control" name="main_type_id" required>
                                                <option value="" selected>Select main type</option>
                                                @isset($shippingType)
                                                    @foreach ($shippingType as $type)
                                                        <option value="{{ $type->id }}">{{ $type->main_type }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Type</label>
                                            <input type="text" class="form-control" placeholder="Enter status type"
                                                name="status_type" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Images</label>
                                            <input type="file" class="form-control" name="image" required>
                                        </div>
                                        <div class="form-group col-md-12 d-flex" style="gap: 10px;">
                                            <div class="form-group mb-0">
                                                <input type="radio" id="first-status" value="first status" name="status">
                                                <label for="first-status">First Status</label>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="radio" id="storage" value="storage" name="status">
                                                <label for="storage">Storage</label>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="radio" id="final-status" value="final status" name="status">
                                                <label for="final-status">Final Status</label>
                                            </div>
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
