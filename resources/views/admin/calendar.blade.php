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
                                <th colspan="7" style="font-size:30px;">November 2023</th>
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
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>30</td>
                            </tr>
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
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle text-danger"></i></td>
                                            <td>Cargo Picked up</td>
                                            <td>1x40’ Container Truck, 1x20’ Container Truck </td>
                                            <td>null</td>
                                            <td>Weblinxsolution</td>
                                            <td>Nary</td>
                                        </tr>
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
    <!--**********************************
                    Content body end
                ***********************************-->
@endsection
