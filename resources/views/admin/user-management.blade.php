@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">User Management</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User Management</a></li>
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
                                    <a href="{{ Route('admin.addUser') }}" class="btn btn-primary">Add User</a>
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
                                            <th>Id</th>
                                            <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>PHONE NUMBER</th>
                                            <th>DATE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex algin-items-center">
                                                        <a href="{{ Route('admin.editUser', ['id' => $user->id]) }}"
                                                            class="btn btn-primary btn-sm mr-2"><i
                                                                class="fa fa-pencil "></i>
                                                        </a>
                                                        <a href="javascript:void()" data-toggle="modal"
                                                            data-target="#delete{{ $user->id }}"
                                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->number }}</td>
                                                <td>
                                                    {{ $user->created_at }}
                                                    {{-- Modal For Deletion Of Users  --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
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
                                                                    <a href="{{ Route('admin.deleteUserDb', ['id' => $user->id]) }}"
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
