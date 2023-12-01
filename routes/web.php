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


    Route::get('/order-management', [AdminController::class, 'order_management'])->name('admin.orderManagement');
    Route::get('/add-order', [AdminController::class, 'add_order'])->name('admin.addOrder');
    Route::get('/edit-order/{id}', [AdminController::class, 'edit_order'])->name('admin.editOrder');
    Route::get('/admin-activity', [AdminController::class, 'admin_activity'])->name('admin.activity');
    Route::get('/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');
    Route::get('/shipping-type', [AdminController::class, 'shipping_type'])->name('admin.shippingType');
    Route::get('/edit-shipping-type', [AdminController::class, 'edit_shipping_type'])->name('admin.editShippingType');
    Route::get('/order-status', [AdminController::class, 'order_status'])->name('admin.orderStatus');
    Route::get('/add-order-status', [AdminController::class, 'add_order_status'])->name('admin.addOrderStatus');
    Route::get('/edit-order-status', [AdminController::class, 'edit_order_status'])->name('admin.editOrderStatus');
    Route::get('/booking-size', [AdminController::class, 'booking_size'])->name('admin.bookingSize');
    Route::get('/add-booking-size', [AdminController::class, 'add_booking_size'])->name('admin.addBookingSize');
    Route::get('/edit-booking-size', [AdminController::class, 'edit_booking_size'])->name('admin.editBookingSize');
    Route::get('/order-history', [AdminController::class, 'order_history'])->name('admin.orderHistory');
});

Route::get('/', function () {

    return view('welcome');
});