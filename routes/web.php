<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// This Routes For Admin
Route::get('/admin/fakeAdmin', [AdminController::class, 'fakeAdmin'])->name('admin.fakeAdmin');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login-check', [AdminController::class, 'login_check'])->name('admin.loginCheck');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['AdminAuth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/filter-dashboard', [AdminController::class, 'filter_dashboard'])->name('admin.filterDashboard');

    // This Route Working For Fetch Admin
    Route::get('/admin-management', [AdminController::class, 'admin_management'])->name('admin.adminManagement');

    // This Route Working For Add Admin
    Route::get('/add-admin', [AdminController::class, 'add_admin'])->name('admin.addAdmin');
    Route::post('/add-admin-db', [AdminController::class, 'add_admin_db'])->name('admin.addAdminDb');

    // This Route Working For Edit Admin
    Route::get('/edit-admin/{id}', [AdminController::class, 'edit_admin'])->name('admin.editAdmin');
    Route::post('/edit-admin-db/{id}', [AdminController::class, 'edit_admin_db'])->name('admin.editAdminDb');

    // This Route Working For Delete Admin
    Route::get('/delete-admin-db/{id}', [AdminController::class, 'delete_admin_db'])->name('admin.deleteAdminDb');


    // This Route Working For Fetch User
    Route::get('/user-management', [AdminController::class, 'user_management'])->name('admin.userManagement');

    // This Route Working For Add User
    Route::get('/add-user', [AdminController::class, 'add_user'])->name('admin.addUser');
    Route::post('/add-user-db', [AdminController::class, 'add_user_db'])->name('admin.addUserDb');

    // This Route Working For Edit User
    Route::get('/edit-user/{id}', [AdminController::class, 'edit_user'])->name('admin.editUser');
    Route::post('/edit-user-db/{id}', [AdminController::class, 'edit_user_db'])->name('admin.editUserDb');

    // This Route Working For Delete User
    Route::get('/delete-user-db/{id}', [AdminController::class, 'delete_user_db'])->name('admin.deleteUserDb');


    // This Route Working For Orders
    // This Route Working For Fetch Admin Activity
    Route::get('/order-management', [AdminController::class, 'order_management'])->name('admin.orderManagement');

    // This Route Working For Add Orders
    Route::get('/add-order', [AdminController::class, 'add_order'])->name('admin.addOrder');
    Route::post('/add-order-db', [AdminController::class, 'add_order_db'])->name('admin.addOrderDb');

    // This Route Working For Set Order Status For Add Orders
    Route::post('/set-order-status', [AdminController::class, 'set_orderStatus'])->name('admin.setOrderStatus');

    // This Route Working For Add Orders
    Route::post('/update-order-status/{order_id}', [AdminController::class, 'update_order_status'])->name('admin.updateOrderStatus');

    // This Route Working For Delete Orders
    Route::get('/delete-order-status/{id}', [AdminController::class, 'delete_order'])->name('admin.deleteOrder');


    // This Route Working For Add Orders
    Route::get('/edit-order/{id}', [AdminController::class, 'edit_order'])->name('admin.editOrder');

    // This Route Working For Admin Activity
    // This Route Working For Fetch Admin Activity
    Route::get('/admin-activity', [AdminController::class, 'admin_activity'])->name('admin.activity');

    // This Route Working For Delete Admin Activity
    Route::get('/delete-admin-activity/{id}', [AdminController::class, 'admin_activity_delete'])->name('admin.deleteActivity');

    // This Route Working For Calendar
    Route::get('/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');

    // This Route Working For Filter Calendar
    Route::post('/ajax-calendar', [AdminController::class, 'calendarAjax'])->name('admin.calendarAjax');




    // This Route Working For Settings
    // This Route Working For Fetch Shipping Type
    Route::get('/shipping-type', [AdminController::class, 'shipping_type'])->name('admin.shippingType');

    // This Route Working For Add Shipping Type
    Route::get('/add-shipping-type', [AdminController::class, 'add_shipping_type'])->name('admin.addShippingType');
    Route::post('/add-shipping-type-db', [AdminController::class, 'add_shipping_type_db'])->name('admin.addShippingTypeDb');

    // This Route Working For Edit Shipping Type
    Route::get('/edit-shipping-type/{id}', [AdminController::class, 'edit_shipping_type'])->name('admin.editShippingType');
    Route::post('/edit-shipping-type-db/{id}', [AdminController::class, 'edit_shipping_type_db'])->name('admin.editShippingTypeDb');

    // This Route Working For Delete Shipping Type
    Route::get('/delete-shipping-type-db/{id}', [AdminController::class, 'delete_shipping_type_db'])->name('admin.deleteShippingTypeDb');

    // This Route Working For Order Status
    // This Route Working For Fetch Order Status
    Route::get('/order-status', [AdminController::class, 'order_status'])->name('admin.orderStatus');

    // This Route Working For Add Order Status
    Route::get('/add-order-status', [AdminController::class, 'add_order_status'])->name('admin.addOrderStatus');
    Route::post('/add-order-status-db', [AdminController::class, 'add_order_status_db'])->name('admin.addOrderStatusDb');

    // This Route Working For Edit Order Status
    Route::get('/edit-order-status/{id}', [AdminController::class, 'edit_order_status'])->name('admin.editOrderStatus');
    Route::post('/edit-order-status-db/{id}', [AdminController::class, 'edit_order_status_db'])->name('admin.editOrderStatusDb');

    // This Route Working For Delete Order Status
    Route::get('/delete-order-status-db/{id}', [AdminController::class, 'delete_order_status_db'])->name('admin.deleteOrderStatusDb');



    // This Route Working For Booking Size
    // This Route Working For Fetch Booking Size
    Route::get('/booking-size', [AdminController::class, 'booking_size'])->name('admin.bookingSize');

    // This Route Working For Add Booking Size
    Route::get('/add-booking-size', [AdminController::class, 'add_booking_size'])->name('admin.addBookingSize');
    Route::post('/add-booking-size-db', [AdminController::class, 'add_booking_size_db'])->name('admin.addBookingSizeDb');

    // This Route Working For Edit Booking Size
    Route::get('/edit-booking-size/{id}', [AdminController::class, 'edit_booking_size'])->name('admin.editBookingSize');
    Route::post('/edit-booking-size-db/{id}', [AdminController::class, 'edit_booking_size_db'])->name('admin.editBookingSizeDb');

    // This Route Working For Delete Booking Size
    Route::get('/delete-booking-size-db/{id}', [AdminController::class, 'delete_booking_size_db'])->name('admin.deleteBookingSizeDb');

    // This Route Working For Order History
    Route::get('/order-history', [AdminController::class, 'order_history'])->name('admin.orderHistory');

    // This Route Working For Order Tracking
    // This Route Working For Order Tracking With Invoice
    Route::get('/order-tracking/{invoice?}', [AdminController::class, 'order_tracking_invoice'])->name('admin.orderTracking');
    Route::get('/order-tracking-db', [AdminController::class, 'order_tracking_invoice_db'])->name('admin.orderTrackingDb');
    Route::get('/order-tracking-ajax', [AdminController::class, 'order_tracking_invoice_ajax'])->name('admin.orderTrackingAjax');

    // This Route Working For Order Tracking View
    // Route::get('/order-tracking', [AdminController::class, 'order_tracking'])->name('admin.orderTracking');
});


Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/login-check', [UserController::class, 'login_check'])->name('user.loginCheck');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::middleware(['UserAuth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/order-tracking', [UserController::class, 'order_tracking'])->name('user.orderTracking');
    Route::post('/order-tracking-result', [UserController::class, 'order_tracking_invoice_db'])->name('user.orderTrackingDb');

});



Route::get('/', function () {

    return view('welcome');
});
