<?php

use App\Http\Controllers\AdminController;
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

    // This Route Working For Add Orders
    Route::get('/edit-order/{id}', [AdminController::class, 'edit_order'])->name('admin.editOrder');

    // This Route Working For Admin Activity
    // This Route Working For Fetch Admin Activity
    Route::get('/admin-activity', [AdminController::class, 'admin_activity'])->name('admin.activity');

    // This Route Working For Delete Admin Activity
    Route::get('/delete-admin-activity/{id}', [AdminController::class, 'admin_activity_delete'])->name('admin.deleteActivity');

    Route::get('/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');



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


    Route::get('/order-history', [AdminController::class, 'order_history'])->name('admin.orderHistory');
});

Route::get('/', function () {

    return view('welcome');
});