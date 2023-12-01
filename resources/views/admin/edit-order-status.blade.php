@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                        Content body start
                                    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col">
                <h4 class="card-title">Edit Order Status</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Order Status</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Order</a></li>
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
                                        <div class="form-group col-md-6">
                                            <label>Main Type</label>
                                            <select class="form-control">
                                                <option>Select main type</option>
                                                <option>Import</option>
                                                <option>Export</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Type</label>
                                            <input type="text" class="form-control" placeholder="Enter status type">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Images</label>
                                            <input type="file" class="form-control" style="border:none">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="checkbox" class="mr-5">
                                            <label>First Status</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="checkbox" class="mr-5">
                                            <label>Storage</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="checkbox" class="mr-5">
                                            <label>Final Status</label>
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
