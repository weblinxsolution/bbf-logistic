@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Order Management</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Orders </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ACTION</th>
                                        <th>USER NAME</th>
                                        <th>ACTIVITY</th>
                                        <th>DATE</th>
                                        <th>TIME</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($adminActivities)
                                        @foreach ($adminActivities as $activity)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="javascript:void()" data-toggle="modal"
                                                        data-target="#delete{{ $activity->id }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $activity->username }}</td>
                                                <td>{{ $activity->admin_activity }}</td>
                                                <td>{{ $activity->created_at->format('d-m-y') }}</td>
                                                <td>
                                                    {{ $activity->created_at->format('H:i:s a') }}
                                                    {{-- Modal For Deletion Of Users  --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete{{ $activity->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                        Modal</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4 class="mb-0">Are you Sure?</h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn text-white btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <a href="{{ Route('admin.deleteActivity', ['id' => $activity->id]) }}"
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

        <!-- #/ container -->
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                        Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
@endsection
