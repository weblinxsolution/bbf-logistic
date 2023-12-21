<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BBF logistic | Admin | {{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> -->
    <!-- Pignose Calender -->
    <link href="{{ asset('admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link href="{{ asset('admin/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet">


    <!-- Data Table CSS -->
    <link href="{{ asset('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ Route('admin.dashboard') }}">
                    <b class="logo-abbr"><img src="{{ asset('admin/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('admin/images/logo-compact.png') }}"
                            alt=""></span>
                    <span class="brand-title">
                        <h3>BBF | Admin</h3>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <a href="javascript:void();" class="fw-bold mr-2"><i class="icon-user"></i>
                                    <span>Weblinxsolution</span></a>
                                <img src="{{ asset('admin/images/user/1.png') }}" height="40" width="40"
                                    alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>

                                        <li>
                                            <a href="update-password.php"><i class="icon-user"></i>
                                                <span>Update Password</span></a>
                                        </li>

                                        <li><a href="{{ Route('admin.logout') }}"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a href="{{ Route('admin.dashboard') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.userManagement') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.orderManagement') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> Order Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.activity') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> Admin Activity</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.calendar') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ Route('admin.shippingType') }}">Shipping Type</a></li>
                            <li><a href="{{ Route('admin.orderStatus') }}">Order Status</a></li>
                            <li><a href="{{ Route('admin.bookingSize') }}">Booking Size</a></li>
                            <!-- <li><a href="update-password.php" aria-expanded="false">Update Password</a></li> -->
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="{{ Route('admin.orderTracking') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> Order Tracking</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ Route('admin.orderHistory') }}" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text"> Order History</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->
