@extends('admin.layout.main')
@section('admin')
    <!--**********************************Content body start***********************************-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .form-control {
            width: 92.6%;
        }
    </style>
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
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ Route('admin.addOrder') }}" class="btn btn-primary">Add Order</a>
                            </div>
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
                            <table class="table table-striped table-bordered zero-configuration table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        {{-- <th>DOCUMENT</th> --}}
                                        <th>CARGO STATUS</th>
                                        <th>ACTION</th>
                                        <th>SHIPPER NAME</th>
                                        <th>CONSINGEE NAME</th>
                                        <th>EMAIL</th>
                                        <th>INVOICE NO</th>
                                        <th>STATUS NAME</th>
                                        {{-- <th>BOOKING SIZE</th> --}}
                                        <th>ADMIN REMARK</th>
                                        <th>CUSTOMER REMARK</th>
                                        <th>ADDED BY</th>
                                        <th>PICKUP DATE</th>
                                        <th>ORDER CREATED DATE</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($orders)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ asset('documents/' . $order->document) }}"
                                                            class="btn btn-dark w-75 my-1"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="{{ asset('documents/' . $order->document) }}" download
                                                            class="ml-2 btn btn-dark  W-100"><i
                                                                class="fa-solid fa-file-arrow-down"></i></a>
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#Add_status{{ $order->id }}">Add Status</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex algin-items-center">
                                                        {{-- <a href="{{ Route('admin.editOrder', ['id' => $order->id]) }}"
                                                            class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil "></i>
                                                        </a> --}}
                                                        <a href="#" data-target="#delete{{ $order->id }}"
                                                            data-toggle="modal" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $order->shipper_name }}</td>
                                                <td>{{ $order->consignee_name }}</td>
                                                <td>
                                                    @foreach ($order->users as $user)
                                                        {{ $user->email }}
                                                    @endforeach
                                                </td>
                                                <td><a
                                                        href="{{ Route('admin.orderTracking', ['invoice' => $order->invoice_no]) }}">{{ $order->invoice_no }}</a>
                                                </td>
                                                <td>
                                                    @if ($order->orderStatus->count() > 0)
                                                        @foreach ($order->orderStatus as $status)
                                                            {{ $status->status_type }}
                                                        @endforeach
                                                    @else
                                                        Created
                                                    @endif

                                                </td>
                                                {{-- <td> --}}
                                                {{-- @foreach ($order->containers->unique('booking_size_id') as $con)
                                                        @php
                                                            $bookingSize = App\Models\BookingSize::find($con->booking_size_id);
                                                        @endphp
                                                        <span class="badge badge-success text-white mb-1"
                                                            style="font-size: 12px;">{{ $bookingSize->booking_size }}</span>
                                                    @endforeach --}}
                                                {{-- </td> --}}

                                                <td>
                                                    {{ $order->admin_remark }}
                                                </td>
                                                <td>
                                                    {{ $order->customer_remark }}
                                                </td>
                                                <td>
                                                    {{ $order->Admins[0]->admin }}
                                                </td>
                                                {{-- <td>{{ $order->added_by }}</td> --}}
                                                <td>{{ \Carbon\Carbon::parse($order->pickup_date)->format('d-m-y') }}</td>
                                                <td>
                                                    {{ $order->created_at->format('m-y-d') }}
                                                </td>
                                            </tr>

                                            {{-- This Modal For Update Order Status Start --}}
                                            <div class="modal fade" id="Add_status{{ $order->id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add Status</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data"
                                                                id="update_status{{ $order->id }}">
                                                                @csrf
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label>Order Status</label>

                                                                        @php
                                                                            $order_type = App\Models\OrderStatus::where('main_type_id', $order->order_type_id)->get();
                                                                        @endphp
                                                                        <select id="order_status{{ $order->id }}"
                                                                            name="status_type"
                                                                            class="form-control select_status change_status{{ $order->id }}"
                                                                            order-id="{{ $order->id }}" required>
                                                                            <option value="" selected>Choose Status
                                                                            </option>
                                                                            @foreach ($order_type as $type)
                                                                                <option value="{{ $type->id }}"
                                                                                    data-status="{{ $type->status }}"
                                                                                    status-name="{{ $type->status }}">
                                                                                    {{ $type->status_type }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <script>
                                                                            $('.change_status{{ $order->id }}').change(function() {
                                                                                var selectedOption = $('option:selected', this);
                                                                                var statusName = selectedOption.attr('status-name');
                                                                                $('.change_status_value{{ $order->id }}').val(statusName);
                                                                            })
                                                                        </script>

                                                                        <input type="hidden" value=""
                                                                            class="change_status_value{{ $order->id }} check_status{{ $order->id }}"
                                                                            name="check_status">
                                                                    </div>

                                                                    {{-- Date Pick Start --}}
                                                                    @php
                                                                        $min_date = App\Models\OrderTracking::where('order_id', $order->id)
                                                                            ->orderBy('created_at', 'Desc')
                                                                            ->first();
                                                                        $formatedDate = \Carbon\Carbon::parse($min_date->pickup_order_date)->format('Y-m-d');
                                                                    @endphp
                                                                    <div class="form-group col-md-12">
                                                                        <label>Date</label>
                                                                        <input type="text"
                                                                            class="form-control datePicker pickup_date{{ $order->id }}"
                                                                            placeholder="date" name="pickup_date" required>
                                                                    </div>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('.pickup_date{{ $order->id }}').datepicker({
                                                                                dateFormat: 'yy-mm-dd',
                                                                                minDate: new Date('{{ $formatedDate }}'),
                                                                            });
                                                                        });
                                                                    </script>
                                                                    {{-- Date Pick End --}}
                                                                    <div
                                                                        class="form-group col-md-12 storage_{{ $order->id }}">

                                                                    </div>

                                                                    <div id="append_data{{ $order->id }}"
                                                                        class="append_data{{ $order->id }} w-100">

                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <label>File upload</label>
                                                                        <input type="file"
                                                                            class="form-control file_{{ $order->id }}"
                                                                            style="border: none" name="file" required>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <label>Cargo Remark</label>
                                                                        <textarea class="form-control cargo_remark{{ $order->id }}" name="cargo_remark" rows="3" required></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="w-100 d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-dark mx-2"
                                                                        data-dismiss="modal">CLOSE</button>
                                                                    <button type="submit" class="btn btn-dark">UPDATE</button>

                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('#update_status{{ $order->id }}').submit(function(e) {
                                                                                e.preventDefault();

                                                                                var selectedOption = $('option:selected', '.change_status{{ $order->id }}');
                                                                                var statusName = selectedOption.attr('status-name');

                                                                                var check_status = $('.check_status{{ $order->id }}').val();
                                                                                var status_id = $('.change_status{{ $order->id }}').val();
                                                                                var pickup_date = $('.pickup_date{{ $order->id }}').val();

                                                                                // Define a regular expression for the desired date format
                                                                                var dateFormat = /^\d{4}-\d{2}-\d{2}$/;

                                                                                // Check if the entered date matches the desired format
                                                                                if (!dateFormat.test(pickup_date)) {
                                                                                    Toastify({
                                                                                        text: 'Pickup Date Required!',
                                                                                        duration: 3000,
                                                                                        close: true,
                                                                                        gravity: "top", // `top` or `bottom`
                                                                                        position: "right", // `left`, `center` or `right`
                                                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                                                        style: {
                                                                                            background: "red",
                                                                                        },
                                                                                    }).showToast();
                                                                                }
                                                                                var image = $('.file_{{ $order->id }}')[0].files[0];
                                                                                var cargo_remark = $('.cargo_remark{{ $order->id }}').val();

                                                                                var storage_days = $('.storage_days{{ $order->id }}').val();
                                                                                var checkedValues = $('.check_container{{ $order->id }}:checked').map(function() {
                                                                                    return this.value;
                                                                                }).get();

                                                                                if (statusName == 'storage' && storage_days == '') {
                                                                                    return Toastify({
                                                                                        text: 'Storage Days Required',
                                                                                        duration: 3000,
                                                                                        close: true,
                                                                                        gravity: "top", // `top` or `bottom`
                                                                                        position: "right", // `left`, `center` or `right`
                                                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                                                        style: {
                                                                                            background: "red",
                                                                                        },
                                                                                    }).showToast();
                                                                                }
                                                                                var formData = new FormData();
                                                                                formData.append('_token', '{{ csrf_token() }}');
                                                                                formData.append('check_status', check_status);
                                                                                formData.append('status_type', status_id);
                                                                                formData.append('pickup_date', pickup_date);
                                                                                formData.append('storage_days', storage_days);
                                                                                formData.append('file', image);
                                                                                formData.append('cargo_remark', cargo_remark);

                                                                                $.each(checkedValues, function(index, value) {
                                                                                    formData.append('count[]', value);
                                                                                });

                                                                                $.ajax({
                                                                                    url: "{{ route('admin.updateOrderStatus', ['order_id' => $order->id]) }}", // corrected the syntax for route function
                                                                                    type: 'POST',
                                                                                    processData: false,
                                                                                    contentType: false,
                                                                                    data: formData,
                                                                                    success: function(response) {
                                                                                        // console.log(response);
                                                                                        if (response.success) {
                                                                                            Toastify({
                                                                                                text: response.message,
                                                                                                duration: 3000,
                                                                                                close: true,
                                                                                                gravity: "top", // `top` or `bottom`
                                                                                                position: "right", // `left`, `center` or `right`
                                                                                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                                                                                style: {
                                                                                                    background: "green",
                                                                                                },
                                                                                            }).showToast();
                                                                                            window.location.reload();
                                                                                        } else {
                                                                                            Toastify({
                                                                                                text: 'Try Again Something went Wrong!',
                                                                                                duration: 3000,
                                                                                                close: true,
                                                                                                gravity: "top", // `top` or `bottom`
                                                                                                position: "right", // `left`, `center` or `right`
                                                                                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                                                                                style: {
                                                                                                    background: "red",
                                                                                                },
                                                                                            }).showToast();
                                                                                        }
                                                                                        // $(`#append_data${order_id}`).empty().append(response);
                                                                                        // alert(response)
                                                                                    },
                                                                                    error: function(error) {
                                                                                        console.log('Error:', error);
                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- This Modal For Update Order Status Start --}}

                                            {{-- Modal For Deletion Of Order --}}
                                            <div class="modal fade" id="delete{{ $order->id }}" tabindex="-1"
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
                                                            <a href="{{ Route('admin.deleteOrder', ['id' => $order->id]) }}"
                                                                class="btn btn-danger text-decoration-none text-white">Yes,
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal  --}}
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
    <!--**********************************Content body end***********************************-->
    <script>
        $('.select_status').change(function() {

            var selectedOption = $('option:selected', this);
            var statusName = selectedOption.attr('status-name');
            // $('.change_status_value').val(statusName);

            // This script working for ajax
            var status_id = $(this).val();
            var order_id = $(this).attr('order-id');

            var storage =
                `<label>Storage Days</label>
                           <input type="number" class="form-control storage_days${order_id}" placeholder="Storage Days" name="storage_days" required>`;
            if (statusName == 'storage') {
                $(`.storage_${order_id}`).html(storage);
            } else {
                $(`.storage_${order_id}`).html('');
            }

            $.ajax({

                url: "{{ Route('admin.orderTrackingAjax') }}",
                type: 'GET',
                data: {
                    order_id: order_id,
                    status_id: status_id
                },
                success: function(response) {
                    // console.log(response);

                    $(`#append_data${order_id}`).html(response);
                    // alert(response)
                    // setTimeout(() => {
                    // console.log(statusName,'status');
                    if (statusName == 'storage' || statusName == 'final status') {
                        var checkboxes = document.querySelectorAll('.status_check');
                        if (checkboxes.length > 0) {
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = true;
                                checkbox.disabled = true;
                                // console.log(checkbox.checked);
                            });
                        } else {
                            console.log("No checkboxes with class 'status_check' found.");
                        }
                    }
                    // }, 1000);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>
    <script>
        // JavaScript code to disable old dates
        var datePickers = document.getElementsByClassName('datePicker');

        for (var i = 0; i < datePickers.length; i++) {
            datePickers[i].min = new Date().toISOString().split('T')[0];
        }

        // Get all elements with the 'data-bs-toggle' attribute set to 'tooltip'
        var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

        // Convert the NodeList to an array using Array.from
        var tooltipTriggerArray = Array.from(tooltipTriggerList);

        // Create an array of Tooltip instances using the map function
        var tooltipList = tooltipTriggerArray.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

@endsection
