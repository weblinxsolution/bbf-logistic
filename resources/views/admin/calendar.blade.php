@extends('admin.layout.main')
@section('admin')
    <style>
        .calendar_ {
            border-collapse: collapse;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .calendar_ th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px;
        }

        .calendar_ td {
            border: 1px solid #dddddd;
            text-align: center;
        }

        .calendar_ td div {
            padding: 10px;
        }

        .calendar_ th {
            background-color: #3498db;
            color: #fff;
        }

        .calendar_ td {
            /*width: 100px !important;*/
            /*height: 100px;*/
            cursor: pointer;
        }

        .calendar_ td:hover {
            background-color: #ecf0f1;
        }
    </style>

    <!--**********************************
                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-box m-b-50">
                    <table class="calendar_">
                        <thead>
                            <tr>
                                <th colspan="7">
                                    <div
                                        style="display: flex; align-items: center; gap: 20px; justify-content: center; font-size: 27px;">
                                        <a href="#" onclick="changeMonth(-1)">
                                            <i class="fa fa-angle-left fa-2x text-white "></i>
                                        </a>
                                        <span id="currentMonth">November 2024</span>
                                        <a href="#" onclick="changeMonth(1)">
                                            <i class="fa fa-angle-right fa-2x text-white "></i>
                                        </a>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody id="calendarBody">
                            <!-- Calendar rows will be dynamically generated here -->
                        </tbody>
                    </table>



                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configurations">
                                    <thead>
                                        <tr>
                                            <th>DEFAULT COLOR </th>
                                            <th>SHIPMENT TYPE</th>
                                            <th>BOOKING SIZE</th>
                                            <th>DESCRIPTION </th>
                                            <th>CLIENT </th>
                                            <th>ADDED BY</th>
                                        </tr>
                                    </thead>
                                    <tbody id="calender_body">
                                        @isset($orders)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-circle"
                                                            style="color: {{ $order->ordersType[0]->color }}"></i>
                                                    </td>
                                                    <td>
                                                        @foreach ($order->tracking as $track)
                                                            {{ $track->cargo_remark != null ? $track->cargo_remark : '' }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($order->checks->unique('booking_size') as $size)
                                                            @php
                                                                $book = \App\Models\BookingSize::find($size->booking_size);
                                                            @endphp
                                                            {{ $book->booking_size }},
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $order->customer_remark }}
                                                    </td>
                                                    <td>
                                                        @foreach ($order->users as $user)
                                                            {{ $user->name }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($order->Admins as $adm)
                                                            {{ $adm->admin }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************Content body end***********************************-->

    <script>
        // Initial date for November 2024
        let currentMonth = new Date(2024, 0, 1); // Month is zero-based (0 = January, 1 = February, ..., 11 = December)

        // Function to change the month
        function changeMonth(offset) {
            currentMonth.setMonth(currentMonth.getMonth() + offset);
            updateCalendar();
        }

        // Function to update the calendar based on the current month
        function updateCalendar() {
            const calendarBody = document.getElementById("calendarBody");
            const currentMonthElement = document.getElementById("currentMonth");

            // Clear existing calendar rows
            calendarBody.innerHTML = "";

            // Update the displayed month
            currentMonthElement.textContent = getFormattedMonth(currentMonth);

            // Logic to generate calendar rows based on the current month
            // (You need to implement this logic based on your specific requirements)
            // ...

            // Example: Generate a simple calendar for the current month
            const lastDay = new Date(currentMonth.getFullYear(), currentMonth.getMonth() + 1, 0).getDate();
            let dayCount = 1;

            for (let i = 0; i < 6; i++) {
                var row = `<tr>`;

                for (let j = 0; j < 7; j++) {
                    var cell = `<td>`;
                    if (dayCount <= lastDay) {
                        var div =
                            `<div onclick="filterDate(${currentMonth.getFullYear()},${currentMonth.getMonth()},${dayCount})">${dayCount}</div>`;
                        cell += div;
                        dayCount++; // Increment dayCount only once
                    }
                    cell += `</td>`;
                    row += cell;
                }
                row += `</tr>`;
                calendarBody.innerHTML += row; // Use innerHTML to append the row to the table
            }
        }

        // Helper function to get a formatted month string
        function getFormattedMonth(date) {
            const options = {
                year: "numeric",
                month: "long"
            };
            return date.toLocaleDateString("en-US", options);
        }

        // Initial calendar update
        updateCalendar();


        function filterDate(year, month, day) {
            // console.log(year, month + 1, day);
            $.ajax({
                url: "{{ route('admin.calendarAjax') }}", // corrected the syntax for route function
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    year: year,
                    day: day,
                    month: month + 1,
                },
                success: function(response) {
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
                        if (response.data != '') {
                            $('#calender_body').html(response.data)
                        } else {
                            $('#calender_body').html(`
                            <tr>
                    <td></td>
                    <td></td>
                    <td>There is No data</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>`);
                        }
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
                        $('#calender_body').empty();
                    }
                    // $(`#append_data${order_id}`).empty().append(response);
                    // alert(response)
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    </script>
@endsection
