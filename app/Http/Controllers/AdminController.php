<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminActivity;
use App\Models\BookingSize;
use App\Models\Check;
use App\Models\Containers;
use App\Models\OrderHistory;
use App\Models\orders;
use App\Models\OrderStatus;
use App\Models\OrderTracking;
use App\Models\ShippingType;
use App\Models\TrackContainer;
use App\Models\User;
use Carbon\Carbon;
use Faker\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function fakeAdmin()
    {
        $new = new Admin;
        $new->admin = "Admin";
        $new->email = "admin@gmail.com";
        $new->password = Hash::make(123456789);
        $new->save();

        return 'Admin Created';
    }

    public function dashboard()
    {
        $title = "Dashboard";
        $complete_order = Orders::where('status', 1)->get();
        $total_order = Orders::all();
        $total_booking_size = BookingSize::all();
        $data = compact('title', 'complete_order', 'total_order', 'total_booking_size');
        return view('admin.index')->with($data);
    }

    public function user_management()
    {
        $title = "User Management";
        $users = User::all();
        $data = compact('title', 'users');
        return view('admin.user-management')->with($data);
    }

    public function add_user()
    {
        $title = "Add User";
        $data = compact('title');
        return view('admin.add-user')->with($data);
    }

    public function add_user_db(Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        $check = User::where('email', $request->email)->first();
        if ($check) {
            return redirect()->back()->with('error', 'Email Already Register');
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->number = $request->number;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.userManagement')->with('success', 'User Successfully Register');
        }
    }

    public function edit_user(Request $request)
    {
        $title = "Edit User";
        $users = User::find($request->id);
        $data = compact('title', 'users');
        return view('admin.edit-user')->with($data);
    }

    public function edit_user_db($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
            "email" => "required|email",
        ]);

        if ($request->password) {
            User::where('id', $id)->update([
                "name" => $request->name,
                "number" => $request->number,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
        } else {
            User::where('id', $id)->update([
                "name" => $request->name,
                "number" => $request->number,
                "email" => $request->email,
            ]);
        }


        $user = User::find($id);
        $data = compact('user');
        return redirect()->back()->with($data)->with('success', 'User Successfully Updated');
    }

    public function delete_user_db(Request $request)
    {
        User::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'User Successfully Deleted');
    }

    public function order_management()
    {
        $title = "Order Management";
        $orders = Orders::where('status', 0)->with('users', 'ordersType', 'orderStatus', 'checks')->get();
        $data = compact('title', 'orders');
        return view('admin.order-management')->with($data);
    }

    public function add_order()
    {
        $title = "Add Order";
        $users = User::all();
        $ordertType = ShippingType::all();
        $bookingSize = BookingSize::all();
        $data = compact('title', 'users', 'ordertType', 'bookingSize');
        return view('admin.add-order')->with($data);
    }

    public function set_orderStatus(Request $request)
    {
        $status = OrderStatus::where('main_type_id', $request->id)->get();
        $option = '<option value="" selected>Choose Type</option>';
        if ($status) {
            foreach ($status as $value) {
                $option .= '<option value="' . $value->id . '">' . $value->status_type . '</option>';
            }
        }
        return $option;
    }

    public function add_order_db(Request $request)
    {
        $request->validate([
            "create_date" => "required",
            "pickup_date" => "required",
            "invoice_no" => "required",
            "shipper_name" => "required",
            "consignee_name" => "required",
            "user_email" => "required",
            "order_type" => "required",
            "status_name" => "required",
            "booking_size" => "required",
            "quantity" => "required",
            "admin_remark" => "required",
            "customer_remark" => "required",
        ]);

        // dd($request->all());

        $createdDate = Carbon::parse($request->create_date);
        $pickUpDate = Carbon::parse($request->pickup_date);

        $order = new Orders;
        $order->pickup_date = $pickUpDate;
        $order->created_order_date = $createdDate;
        $order->invoice_no = $request->invoice_no;
        $order->shipper_name = $request->shipper_name;
        $order->consignee_name = $request->consignee_name;
        $order->user_email_id = $request->user_email;
        $order->order_type_id = $request->order_type;
        $order->status_type_id = $request->status_name;
        $order->admin_remark = $request->admin_remark;
        $order->customer_remark = $request->customer_remark;
        $order->save();

        $countStatus = OrderStatus::where("main_type_id", $request->order_type)->get();

        for ($J = 0; $J < count($countStatus); $J++) {

            foreach ($request['booking_size'] as $key => $size) {

                for ($i = 1; $i <= $request['quantity'][$key]; $i++) {
                    $check = new Check;
                    $check->order_id = $order->id;
                    $check->booking_size = $size;
                    $check->created_order_date = $createdDate;
                    $check->check = $i;
                    $check->status_id = $countStatus[$J]["id"];
                    $check->status = 0;
                    $check->save();
                }
            }

        }

        $tracking = new OrderTracking;
        $tracking->order_id = $order->id;
        $tracking->order_status_id = $request->status_name;
        $tracking->cargo_remark = $request->cargo_remark;
        $tracking->created_order_date = $request->pickup_date;
        $tracking->save();

        // dd($container);
        return redirect()->route('admin.orderManagement')->with('success', 'Order Successfully Added');
    }

    public function update_order_status(Request $request)
    {

        $order_id = $request->order_id;
        $order_status_id = $request->status_type;

        $pickUpDate = Carbon::parse($request->pickup_date);
        // dd($pickUpDate);

        if (str_replace(' ', '-', $request->check_status) == 'final-status' || $request->check_status == 'final status') {
            Orders::where('id', $order_id)->update([
                "status_type_id" => $order_status_id,
                "pickup_date" => $pickUpDate,
                "final_order_date" => $pickUpDate,
                "status" => 1
            ]);
        } else {
            Orders::where('id', $order_id)->update([
                "status_type_id" => $order_status_id,
                "pickup_date" => $pickUpDate,
            ]);
        }
        $quantity = 0;
        if ($request['count']) {
            foreach ($request['count'] as $id) {
                $quantity++;
                Check::where('id', $id)->update([
                    "created_order_date" => $pickUpDate,
                    "status_id" => $order_status_id,
                    "status" => 1
                ]);
            }
        }


        $fileName = null;
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('documents'), $fileName);
        }

        $tracking = new OrderTracking;
        $tracking->order_id = $order_id;
        $tracking->order_status_id = $order_status_id;
        $tracking->cargo_remark = $request->cargo_remark;
        $tracking->document = $fileName;
        $tracking->created_order_date = $pickUpDate;
        $tracking->save();

        // return redirect()->route('admin.orderManagement')->with('success', 'Order Successfully Updated');
        return response()->json(['success' => true, 'message' => 'Order Successfully Updated']);

    }

    public function order_tracking_invoice_ajax(Request $request)
    {
        $order_id = $request["order_id"];
        $status_id = $request["status_id"];


        $checkBoxes = DB::select("SELECT booking_size, COUNT(*) AS `check`
        FROM checks
        WHERE order_id = $order_id AND status_id = $status_id
        GROUP BY booking_size");

        $html = '';
        foreach ($checkBoxes as $check) {
            $size = BookingSize::find($check->booking_size);
            $html .= '<div class="col-lg-12">
                        <label>Booking Size</label>
                        <div class="form-group mb-2 col-md-12 px-0">
                            <input type="text"
                                class="form-control" disabled
                                value="' . $size->booking_size . '">
                        </div>
                        <div class="form-row mx-0">
                            <div class="form-group mb-2 col-md-12 px-0">
                                <label>Each Check Count one</label>
                            </div>';

            $count_check = DB::select("SELECT *
                        FROM checks
                        WHERE order_id = $order_id AND status_id = $status_id AND  `booking_size` =$check->booking_size
                    ");

            foreach ($count_check as $count_check_dt) {
                $html .= '<div class="form-group col-md-1">
                                        <input type="checkbox"
                                            class="check_container' . $order_id . '"
                                            id="check_values"
                                            name="count[]"
                                            ' . ($count_check_dt->status == 1 ? 'checked' : '') . '
                                            value="' . $count_check_dt->id . '">
                                    </div>';
            }

            $html .= '
                                    </div>
                                </div>';
        }
        return $html;
    }

    public function edit_order()
    {
        $title = "Edit Order";
        $data = compact('title');
        return view('admin.edit-order')->with($data);
    }

    public function admin_activity()
    {
        $title = "Admin Activity";
        $adminActivities = AdminActivity::all();
        $data = compact('title', 'adminActivities');
        return view('admin.admin-activity')->with($data);
    }
    public function admin_activity_delete(Request $request)
    {
        AdminActivity::where('id', $request->id)->delete();
        return redirect()->route('admin.activity')->with('success', 'Admin Activity Successfully Deleted');
    }

    public function calendar()
    {
        $title = "Calendar";
        $data = compact('title');
        return view('admin.calendar')->with($data);
    }

    public function shipping_type()
    {
        $title = "Shipping Type";
        $shippingType = ShippingType::all();
        $data = compact('title', 'shippingType');
        return view('admin.shipping-type')->with($data);
    }
    public function add_shipping_type()
    {
        $title = "Add Shipping Type";
        $data = compact('title');
        return view('admin.add-shipping-type')->with($data);
    }

    public function add_shipping_type_db(Request $request)
    {
        $request->validate([
            "main_type" => "required",
            "status" => "required",
        ]);
        $shipping = new ShippingType;
        $shipping->main_type = $request->main_type;
        $shipping->color = $request->color;
        $shipping->status = $request->status;
        $shipping->save();

        return redirect()->route('admin.shippingType')->with('success', 'Shipping Type Successfully Added');
    }
    public function edit_shipping_type(Request $request)
    {
        $title = "Edit Shipping Type";
        $shippingType = ShippingType::find($request->id);
        $data = compact('title', 'shippingType');
        return view('admin.edit-shipping-type')->with($data);
    }

    public function edit_shipping_type_db(Request $request)
    {
        $request->validate([
            "main_type" => "required",
            "status" => "required",
        ]);
        $title = "Edit Shipping Type";
        $shippingType = ShippingType::where('id', $request->id)->update([
            "main_type" => $request->main_type,
            "color" => $request->color,
            "status" => $request->status,
        ]);
        $data = compact('title', 'shippingType');
        return redirect()->route('admin.shippingType')->with($data)->with('success', 'Shipping Type Successfully Updated');
    }

    public function delete_shipping_type_db(Request $request)
    {
        $title = "Shipping Type";
        ShippingType::where('id', $request->id)->delete();
        $shippingType = ShippingType::all();
        $data = compact('title', 'shippingType');
        return redirect()->back()->with($data)->with('success', 'Shipping Type Successfully Deleted');
    }

    public function order_status()
    {
        $title = "Order Status";
        $orderStatus = OrderStatus::with('shipping_types')->get();
        $data = compact('title', 'orderStatus');
        return view('admin.order-status')->with($data);
    }

    public function add_order_status()
    {
        $title = "Add Order Status";
        $shippingType = ShippingType::all();
        $data = compact('title', 'shippingType');
        return view('admin.add-order-status')->with($data);
    }

    public function add_order_status_db(Request $request)
    {

        $request->validate([
            'main_type_id' => 'required',
            'status_type' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg',
        ]);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('orderStatus'), $fileName);
        }

        $newOrderStatus = new OrderStatus;
        $newOrderStatus->main_type_id = $request->main_type_id;
        $newOrderStatus->status_type = $request->status_type;
        $newOrderStatus->status = $request->status;
        $newOrderStatus->image = $fileName;
        $newOrderStatus->save();

        $title = "Add Order Status";
        $data = compact('title');
        return redirect()->route('admin.orderStatus')->with($data)->with('success', 'Order Status Successfully Added');
    }

    public function edit_order_status(Request $request)
    {
        $title = "Edit Order Status";
        $orderStatus = OrderStatus::where('id', $request->id)->with('shipping_types')->first();
        $shippingType = ShippingType::all();
        $data = compact('title', 'orderStatus', 'shippingType');
        return view('admin.edit-order-status')->with($data);
    }
    public function edit_order_status_db(Request $request)
    {
        $request->validate([
            'main_type_id' => 'required',
            'status_type' => 'required',
            'status' => 'required',
            'old_image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('orderStatus'), $fileName);
        } else {
            $fileName = $request->old_image;
        }
        OrderStatus::where('id', $request->id)->update([
            'main_type_id' => $request->main_type_id,
            'status_type' => $request->status_type,
            'status' => $request->status,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.orderStatus')->with('success', 'Order Status Successfully Updated');
    }


    public function delete_order_status_db(Request $request)
    {
        OrderStatus::where('id', $request->id)->delete();
        return redirect()->route('admin.orderStatus')->with('success', 'Order Status Successfully Deleted');
    }


    public function booking_size()
    {
        $title = "Booking Size";
        $bookingSize = BookingSize::all();
        $data = compact('title', 'bookingSize');
        return view('admin.booking-size')->with($data);
    }

    public function add_booking_size()
    {
        $title = "Add Booking Size";
        $data = compact('title');
        return view('admin.add-booking-size')->with($data);
    }
    public function add_booking_size_db(Request $request)
    {
        $request->validate([
            "booking_size" => "required"
        ]);
        $bookingSize = new BookingSize;
        $bookingSize->booking_size = $request->booking_size;
        $bookingSize->save();
        return redirect()->route('admin.bookingSize')->with('success', 'Booking Size Successfully Added');
    }

    public function edit_booking_size(Request $request)
    {
        $title = "Edit Booking Size";
        $bookingSize = BookingSize::where('id', $request->id)->first();
        $data = compact('title', 'bookingSize');
        return view('admin.edit-booking-size')->with($data);
    }

    public function edit_booking_size_db(Request $request)
    {
        $request->validate([
            "booking_size" => "required"
        ]);
        BookingSize::where('id', $request->id)->update([
            "booking_size" => $request->booking_size
        ]);
        return redirect()->route('admin.bookingSize')->with('success', 'Booking Size Successfully Updated');
    }

    public function delete_booking_size_db(Request $request)
    {
        BookingSize::where('id', $request->id)->delete();
        return redirect()->route('admin.bookingSize')->with('success', 'Booking Size Successfully Deleted');
    }


    public function order_history()
    {
        $title = "Order History";
        $orders = Orders::where('status', 1)->get();
        $data = compact('title', 'orders');
        return view('admin.order-history')->with($data);
    }

    public function order_tracking_invoice(Request $request)
    {
        $title = "Order Tracking";
        if ($request->invoice) {
            $invoice = $request->invoice;
            $orders = Orders::where('invoice_no', $request->invoice)->with('users', 'ordersType', 'orderStatus')->first();
            $tracking = OrderTracking::where('order_id', $orders->id)->get();
            $data = compact('title', 'orders', 'tracking', 'invoice');
        } else {
            $data = compact('title');
        }
        return view('admin.order-tracking')->with($data);
    }

    // public function order_tracking_invoice_db(Request $request)
    // {
    //     $title = "Order Tracking";
    //     $orders = Orders::where('invoice_no', $request->invoice)->with('users', 'ordersType', 'orderStatus', 'containers')->first();
    //     $tracking = OrderTracking::where('order_id', $orders->id)->get();
    //     $data = compact('title', 'orders', 'tracking');
    //     // dd($data);
    //     return redirect()->back()->with($data);
    // }

    public function login()
    {
        $title = "Login";
        $data = compact('title');
        return view('admin.login')->with($data);
    }

    public function login_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $check = Admin::where("email", $request->email)->first();

        if ($check) {

            if (Hash::check($request->password, $check->password)) {

                session()->put("admin_id", $check->id);

                $activity = new AdminActivity;
                $activity->username = $check->admin;
                $activity->admin_activity = 'Login';
                $activity->save();

                return redirect()->route("admin.dashboard");
            } else {

                return redirect()->back()->with("error", "Please provide valid credentials.");
            }
        } else {

            return redirect()->back()->with("error", "Please provide valid credentials.");
        }
    }

    public function logout()
    {
        $session_id = session()->get("admin_id");
        $admin = Admin::find($session_id);
        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Logout';
        $activity->save();

        session()->forget("admin_id");

        return redirect()->route("admin.login")->with("success", "Loggedout successfully !");
    }
}