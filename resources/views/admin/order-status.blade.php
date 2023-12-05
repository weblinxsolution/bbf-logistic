@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Order Status</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order Status</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Items </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ Route('admin.addOrderStatus') }}" class="btn btn-primary">Add Order
                                        Status</a>
                                </div>
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
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>SHIPPING ID</th>
                                            <th>ACTION</th>
                                            <th>DATE</th>
                                            <th>STATUS TYPE</th>
                                            <th>MAIN TYPE</th>
                                            <th>STATUS</th>
                                            <th>IMAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($orderStatus)
                                            @foreach ($orderStatus as $status)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div class="d-flex algin-items-center">
                                                            <a href="{{ Route('admin.editOrderStatus', ['id' => $status->id]) }}"
                                                                class="btn btn-primary btn-sm mr-2"><i
                                                                    class="fa fa-pencil "></i>
                                                            </a>
                                                            <a href="javascript:void()" data-toggle="modal"
                                                                data-target="#delete{{ $status->id }}"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $status->created_at->format('d-m-y') }}</td>
                                                    <td>{{ $status->status_type }}</td>
                                                    <td>
                                                        @foreach ($status->shipping_types as $type)
                                                            {{ $type->main_type }}
                                                        @endforeach
                                                    </td>
                                                    <td><span class="badge bg-success text-white"
                                                            style="font-size: 12px;">{{ $status->status }}</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('orderStatus/' . $status->image) }}" width="130px"
                                                            alt="image">

                                                        {{-- Modal For Deletion Of Users  --}}
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete{{ $status->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                            Modal</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 class="mb-0">Are you Sure?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn text-white btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <a href="{{ Route('admin.deleteOrderStatusDb', ['id' => $status->id]) }}"
                                                                            class="btn btn-danger text-decoration-none text-white">Yes,
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End Modal  --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="basicModal">
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
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
@endsection
