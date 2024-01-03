@extends('admin.layout.main')
@section('admin')
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0 mt-3">
            <div class="col p-md-0">
                <h4 class="card-title">Add Order</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Order</a></li>
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
                                <form action="{{ Route('admin.addOrderDb') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Order Created Date</label>
                                            <input type="date" class="form-control" name="create_date" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pickup Date</label>
                                            <input type="date" class="form-control" name="pickup_date" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Invoice no</label>
                                            <input type="text" class="form-control" placeholder="Invoice no"
                                                name="invoice_no" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Shipper name </label>
                                            <input type="text" class="form-control" placeholder="Shipper name"
                                                name="shipper_name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Consignee name </label>
                                            <input type="text" class="form-control" placeholder="Consingee name"
                                                name="consignee_name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email </label>
                                            <select class="form-control" name="user_email" required>
                                                <option value="" selected>Choose Email</option>
                                                @isset($users)
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Shipping type</label>
                                            <select class="form-control" name="order_type" required id="order_type">
                                                <option value="" selected>Choose Type</option>
                                                @isset($ordertType)
                                                    @foreach ($ordertType as $type)
                                                        <option value="{{ $type->id }}">{{ $type->main_type }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label>Status Name</label>
                                            <select class="form-control" name="status_name" id="status_" required>
                                                <option value="" selected>Choose Type</option>

                                            </select>
                                        </div> --}}
                                        <div class="w-100">
                                            <div class="row w-100 mx-0">
                                                <div class="col-lg-12 d-flex justify-content-end">

                                                    <button class="btn btn-primary" type="button" onclick="appendDiv()"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Booking size</label>
                                                    <select class="form-control" name="booking_size[]"
                                                        onchange="fetchSizeId(this)" required>
                                                        <option value="" selected>Choose Type</option>
                                                        @isset($bookingSize)
                                                            @foreach ($bookingSize as $size)
                                                                <option value="{{ $size->id }}">{{ $size->booking_size }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Quantity</label>
                                                    <input type="number" value="0" class="form-control"
                                                        placeholder="Admin remark" onkeyup="appendFields(this)"
                                                        name="quantity[]" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100 mx-0" id="append_here"></div>
                                        <div class="row mx-0 w-100">
                                            <div class="form-group col">
                                                <label>Admin remark </label>
                                                <input type="text" class="form-control" placeholder="Admin remark"
                                                    name="admin_remark" required>
                                            </div>
                                            <div class="form-group col">
                                                <label>Customer remark</label>
                                                <input type="text" class="form-control" placeholder="Customer remark"
                                                    name="customer_remark" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <button type="submit" class="btn btn-dark d-block ml-auto">Add Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************Content body end***********************************-->

    <script>
        // Define the fetchSizeId function
        function fetchSizeId(select) {
            // Access the parent element of the select element
            var parentElement = select.parentElement;

            // Access the parent element of the parent element
            var grandparentElement = parentElement.parentElement;

            // Access a specific child element (e.g., the first child)
            var specificChild = grandparentElement.children[2];

            // Now, you can do something with the specific child element
            specificChild.children[1].value = 0;

            // Assuming grandparentElement is a DOM element, and you want to find and remove all children with a specific class name
            var childrenToRemove = Array.from(grandparentElement.children).filter(function(child) {
                return child.classList.contains('name_');
            });

            if (childrenToRemove) {
                // Removing all found children
                childrenToRemove.forEach(function(child) {
                    child.remove();
                });
            }


            if (select.value == '') {
                specificChild.children[1].setAttribute('disabled', 'disabled');
                specificChild.children[1].removeAttribute('bookId', select.value);
            } else {
                specificChild.children[1].removeAttribute('disabled');
                specificChild.children[1].setAttribute('bookId', select.value);
            }
        }
    </script>
    <script>
        function appendDiv() {
            var html = `
            <div class="w-100 ">
                <div class="row w-100 mb-3 mx-0">
                                                             <div class="col-lg-12 d-flex justify-content-end">

                                                                <button class="btn btn-danger mt-3 ml-2" type="button" onclick="remove(this)"><i class="fa fa-trash"></i></button>

                                                </div>

                                            <div class="form-group col-md-6">
                                                <label>Booking size</label>
                                                <select class="form-control" onchange="fetchSizeId(this)" name="booking_size[]" required>
                                                    <option value="" selected>Choose Type</option>
                                                    @isset($bookingSize)
                                                        @foreach ($bookingSize as $size)
                                                            <option value="{{ $size->id }}">{{ $size->booking_size }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Quantity</label>
                                                <input type="number" value="0" class="form-control"
                                                    placeholder="Admin remark" onkeyup="appendFields(this)" name="quantity[]" required disabled>
                                            </div>
                                        </div>

                </div>
                `;
            $('#append_here').append(html);
        }


        function remove(box) {
            box.parentNode.parentNode.remove();
        }


        function appendFields(qty) {
            // console.log(qty.value);

            if (qty) {
                var bookIdValue = qty.getAttribute('bookId');

                var elementsToRemove = qty.parentNode.parentElement.getElementsByClassName('name_');
                while (elementsToRemove.length > 0) {
                    elementsToRemove[0].parentNode.removeChild(elementsToRemove[0]);
                }

                for (let i = 0; i < qty.value; i++) {
                    var newDiv = document.createElement('div');
                    newDiv.className = 'name_ col d-flex gap-2';
                    newDiv.innerHTML = `<input type="text" value="" class="form-control" placeholder="Name" name="name${bookIdValue}[]" required>
                    `;

                    // Append the new div
                    qty.parentNode.parentElement.appendChild(newDiv);
                }
            }

        }

        // $('#order_type').change(function() {
        //     var id = $(this).val();
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         },
        //         url: "{{ Route('admin.setOrderStatus') }}",
        //         type: 'POST',
        //         data: {
        //             id: id
        //         },
        //         success: function(response) {
        //             $('#status_').html(response);
        //         },
        //         error: function(error) {
        //             console.log('Error:', error);
        //         }
        //     });
        // });
    </script>
@endsection
