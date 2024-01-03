<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminActivity;
use App\Models\BookingSize;
use App\Models\Check;
use App\Models\Containers;
use App\Models\OrderHistory;
use App\Models\Orders;
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
    public function fakeAdmin()
    {
        $new = new Admin;
        $new->admin = "Super Admin";
        $new->email = "admin@gmail.com";
        $new->number = +12243254359;
        $new->role = 1;
        $new->status = 1;
        $new->password = Hash::make(123456789);
        $new->save();

        return 'Super Admin Created';
    }

    public function dashboard(Request $request)
    {
        $title = "Dashboard";

        // This query will be working to get search results with respect to input
        if (isset($request["start_date"])) {
            $startDate = $request["start_date"];
        } else {
            $startDate = NULL;
        }

        if (isset($request["end_date"])) {
            $endDate = $request["end_date"];
        } else {
            $endDate = NULL;
        }

        if (isset($request["type"])) {
            $type = $request["type"];
        } else {
            $type = NULL;
        }

        $query = Orders::query();

        if ($startDate != NULL || $endDate != NULL) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($type != NULL) {
            $query->where('order_type_id', $type);
        }

        if ($request['submit']) {
            $complete_order = $query->where('status', 1)->get();
        } else {
            $complete_order = Orders::where('status', 1)->get();
        }
        // End Query

        $title = "Dashboard";
        $total_order = Orders::all();
        $total_booking_size = BookingSize::all();
        $shipping_type = ShippingType::all();
        $data = compact('title', 'complete_order', 'total_order', 'total_booking_size', 'shipping_type');
        return view('admin.index')->with($data);
    }

    public function admin_management()
    {
        $title = "Admin Management";
        $admin = Admin::all();
        $data = compact('title', 'admin');
        return view('admin.admin-management')->with($data);
    }

    public function add_admin()
    {
        $title = "Add Admin";
        $data = compact('title');
        return view('admin.add-admin')->with($data);
    }

    public function add_admin_db(Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        $check = Admin::where('email', $request->email)->first();
        if ($check) {
            return redirect()->back()->with('error', 'Email Already Register');
        } else {
            $admin = new Admin;
            $admin->admin = $request->name;
            $admin->email = $request->email;
            $admin->number = $request->number;
            $admin->password = Hash::make($request->password);
            $admin->role = 0;
            $admin->save();

            $admin_id = session()->get('admin_id');
            $admin = Admin::find($admin_id);

            $activity = new AdminActivity;
            $activity->username = $admin->admin;
            $activity->admin_activity = 'Add Admin ( ' . " $request->name " . ' )';
            $activity->role = $admin->role;
            $activity->save();

            return redirect()->route('admin.adminManagement')->with('success', 'Admin Successfully Register');
        }
    }

    public function edit_admin(Request $request)
    {
        $title = "Edit Admin";
        $admin = Admin::find($request->id);
        $data = compact('title', 'admin');
        return view('admin.edit-admin')->with($data);
    }

    public function edit_admin_db($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
            "email" => "required|email",
        ]);

        if ($request->password) {
            Admin::where('id', $id)->update([
                "admin" => $request->name,
                "number" => $request->number,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
        } else {
            Admin::where('id', $id)->update([
                "admin" => $request->name,
                "number" => $request->number,
                "email" => $request->email,
            ]);
        }

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Edit Admin ( ' . " $request->name " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        return redirect()->route('admin.adminManagement')->with('success', 'Admin Successfully Updated');
    }

    public function delete_admin_db(Request $request)
    {
        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);
        $admin_user = Admin::find($request->id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete Admin ( ' . " $admin_user->admin " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        Admin::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Admin Successfully Deleted');
    }


    // User Mangement
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

            $admin_id = session()->get('admin_id');
            $admin = Admin::find($admin_id);

            $activity = new AdminActivity;
            $activity->username = $admin->admin;
            $activity->admin_activity = 'Add User ( ' . " $request->name " . ' )';
            $activity->role = $admin->role;
            $activity->save();

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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Edit User ( ' . " $request->name " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        return redirect()->route('admin.userManagement')->with('success', 'User Successfully Updated');
    }

    public function delete_user_db(Request $request)
    {
        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);
        $user = User::find($request->id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete User ( ' . " $user->name " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        User::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'User Successfully Deleted');
    }

    public function order_management()
    {
        $title = "Order Management";
        $admin_id = session()->get('admin_id');
        $orders = Orders::where('admin_id', $admin_id)->where('status', 0)->with('users', 'ordersType', 'orderStatus', 'checks', 'Admins')->get();
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
            "booking_size" => "required",
            "quantity" => "required",
            "admin_remark" => "required",
            "customer_remark" => "required",
        ]);

        // dd($request->all());

        $createdDate = Carbon::parse($request->create_date);
        $pickUpDate = Carbon::parse($request->pickup_date);

        $admin_id = session()->get('admin_id');

        $order = new Orders;
        $order->admin_id = $admin_id;
        $order->pickup_date = $pickUpDate;
        $order->created_order_date = $createdDate;
        $order->invoice_no = $request->invoice_no;
        $order->shipper_name = $request->shipper_name;
        $order->consignee_name = $request->consignee_name;
        $order->user_email_id = $request->user_email;
        $order->order_type_id = $request->order_type;
        $order->admin_remark = $request->admin_remark;
        $order->customer_remark = $request->customer_remark;
        $order->save();

        $countStatus = OrderStatus::where("main_type_id", $request->order_type)->get();



        for ($J = 0; $J < count($countStatus); $J++) {

            foreach ($request['booking_size'] as $key => $size) {

                for ($i = 0; $i < $request['quantity'][$key]; $i++) {
                    $check = new Check;
                    $check->order_id = $order->id;
                    $check->booking_size = $size;
                    $check->created_order_date = $createdDate;
                    $check->name = $request['name' . $size][$i];
                    $check->check = $i;
                    $check->status_id = $countStatus[$J]["id"];
                    $check->status = 0;
                    $check->save();
                }
            }

        }

        Check::where('status_id', $request->status_name)->update([
            "status" => 1
        ]);

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Create Order & Invoice Number is ( ' . " $request->invoice_no " . ' )';
        $activity->role = $admin->role;
        $activity->save();


        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $tracking = new OrderTracking;
                $tracking->order_id = $order->id;
                $tracking->created_order_date = $createdDate;
                $tracking->save();

            } else {
                $tracking = new OrderTracking;
                $tracking->order_id = $order->id;
                $tracking->pickup_order_date = $pickUpDate;
                $tracking->save();
            }
        }

        // dd($container);
        return redirect()->route('admin.orderManagement')->with('success', 'Order Successfully Added');
    }

    public function update_order_status(Request $request)
    {

        $request->validate([
            "pickup_date" => "required|date"
        ]);

        $order_id = $request->order_id;
        $order_status_id = $request->status_type;

        $pickUpDate = Carbon::parse($request->pickup_date);
        // dd($pickUpDate);

        if (str_replace(' ', '-', $request->check_status) == 'final-status' || $request->check_status == 'final status') {
            Orders::where('id', $order_id)->update([
                "status_type_id" => $order_status_id,
                "final_order_date" => $pickUpDate,
                "status" => 1
            ]);
        } else if ($request->storage_days) {
            Orders::where('id', $order_id)->update([
                "status_type_id" => $order_status_id,
                "storage_days" => $request->storage_days,
            ]);
        } else {
            Orders::where('id', $order_id)->update([
                "status_type_id" => $order_status_id,
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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);
        $orderInvoice = Orders::find($order_id);
        $orderStatus = OrderStatus::find($order_status_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Update Order Status ( ' . " $orderStatus->status_type " . ' ) And Inovice Number is (' . $orderInvoice->invoice_no . ')';
        $activity->role = $admin->role;
        $activity->save();


        $tracking = new OrderTracking;
        $tracking->order_id = $order_id;
        $tracking->order_status_id = $order_status_id;
        $tracking->cargo_remark = $request->cargo_remark;
        $tracking->document = $fileName;
        $tracking->pickup_order_date = $pickUpDate;
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

            // $count_check = Check::where('order_id', $order_id)->where('booking_size', $size->id)->where('status_id',$status_id)->get();

            foreach ($count_check as $count_check_dt) {
                $html .= '<div class="form-group col-md-1">
                                        <input type="checkbox"
                                            data-toggle="tooltip" data-placement="top" title="' . $count_check_dt->name . '"
                                            class="status_check check_container' . $order_id . '"
                                            id="check_values"
                                            name="count[]"
                                            ' . ($count_check_dt->status == 1 ? 'checked disabled' : '') . '
                                            value="' . $count_check_dt->id . '">
                                    </div>';
            }

            $html .= '
                                    </div>
                                </div>';
        }

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);
        $orderInvoice = Orders::find($order_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Track Order Status & Inovice Number is (' . $orderInvoice->invoice_no . ')';
        $activity->role = $admin->role;
        $activity->save();

        return $html;
    }

    public function edit_order()
    {
        $title = "Edit Order";
        $data = compact('title');
        return view('admin.edit-order')->with($data);
    }

    public function delete_order($id)
    {

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $order = Orders::find($id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete Order Invoice Number is ( ' . " $order->invoice_no " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        Orders::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Order Successfully Deleted');
    }

    public function admin_activity()
    {
        $title = "Admin Activity";

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        if ($admin->role == 1) {
            $adminActivities = AdminActivity::latest()->get();
        } else {
            $adminActivities = AdminActivity::where('role', 0)->latest()->get();
        }

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
        $admin_id = session()->get('admin_id');

        $title = "Calendar";
        $orders = Orders::where('admin_id', $admin_id)->where('status', 1)->with('users', 'ordersType', 'orderStatus', 'checks', 'Admins', 'tracking')->get();
        $data = compact('title', 'orders');
        return view('admin.calendar')->with($data);
    }

    public function calendarAjax(Request $request)
    {
        $admin_id = session()->get('admin_id');
        $date = Carbon::createFromDate(
            $request['year'],
            $request['month'],
            $request['day']
        )->format('Y-m-d');

        $orders = Orders::where('admin_id', $admin_id)->where('status', 1)->whereDate('created_at', '=', $date)->with('users', 'ordersType', 'orderStatus', 'checks', 'Admins', 'tracking')->get();

        $html = '';
        foreach ($orders as $order) {
            $html .= '<tr>';

            // First column with the circle icon
            $html .= '<td>';
            $html .= '<i class="fa fa-circle" style="color: ' . $order->ordersType[0]->color . '"></i>';
            $html .= '</td>';

            // Second column with tracking information
            $html .= '<td>';
            foreach ($order->tracking as $track) {
                $html .= $track->cargo_remark != null ? $track->cargo_remark : '';
            }
            $html .= '</td>';

            // Third column with unique booking sizes
            $html .= '<td>';
            foreach ($order->checks->unique('booking_size') as $size) {
                $book = \App\Models\BookingSize::find($size->booking_size);
                $html .= $book->booking_size . ', ';
            }
            $html .= '</td>';

            // Fourth column with customer remark
            $html .= '<td>' . $order->customer_remark . '</td>';

            // Fifth column with user names
            $html .= '<td>';
            foreach ($order->users as $user) {
                $html .= $user->name;
            }
            $html .= '</td>';

            // Sixth column with admin names
            $html .= '<td>';
            foreach ($order->Admins as $adm) {
                $html .= $adm->admin;
            }
            $html .= '</td>';

            $html .= '</tr>';
        }

        return response()->json(['success' => true, 'message' => $date, 'data' => $html], 200);
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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Create Shipping Type ( ' . " $request->main_type " . ' )';
        $activity->role = $admin->role;
        $activity->save();


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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Edit Shipping Type ( ' . " $request->main_type " . ' )';
        $activity->role = $admin->role;
        $activity->save();
        $data = compact('title', 'shippingType');

        return redirect()->route('admin.shippingType')->with($data)->with('success', 'Shipping Type Successfully Updated');
    }

    public function delete_shipping_type_db(Request $request)
    {

        $shippingType = ShippingType::find($request->id);

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete Shipping Type ( ' . " $shippingType->main_type " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        ShippingType::where('id', $request->id)->delete();
        return redirect()->route('admin.shippingType')->with('success', 'Shipping Type Successfully Deleted');
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
            'image' => 'required|mimes:png,jpg,jpeg,svg',
        ]);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('orderStatus'), $fileName);
        }

        $newOrderStatus = new OrderStatus;
        $newOrderStatus->main_type_id = $request->main_type_id;
        $newOrderStatus->status_type = $request->status_type;
        $newOrderStatus->status = (!$request->status ? null : $request->status);
        $newOrderStatus->image = $fileName;
        $newOrderStatus->save();

        $order = Orders::where('status', 0)->get();
        foreach ($order as $order_value) {
            $container = DB::table('checks')
                ->select('booking_size', DB::raw('COUNT(*) as check_count'))
                ->where('order_id', $order_value->id)
                ->where('status_id', $order_value->status_type_id)
                ->groupBy('booking_size')
                ->get();


            // dd($container, 'Ayga Sabar Rakh bHai');

            foreach ($container as $check_value) {
                for ($i = 1; $i <= $check_value->check_count; $i++) {
                    $check = new Check;
                    $check->order_id = $order_value->id;
                    $check->booking_size = $check_value->booking_size;
                    $check->created_order_date = $order_value->created_order_date;
                    $check->check = $i;
                    $check->status_id = $newOrderStatus->id;
                    $check->status = 0;
                    $check->save();
                }
            }
        }

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Create Order Status ( ' . " " . (!$request->status ? 'null' : $request->status) . " " . ' )';
        $activity->role = $admin->role;
        $activity->save();

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
            'status' => (!$request->status ? null : $request->status),
            'image' => $fileName,
        ]);

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Edit Order Status ( ' . " " . (!$request->status ? 'null' : $request->status) . " " . ' )';
        $activity->role = $admin->role;
        $activity->save();

        return redirect()->route('admin.orderStatus')->with('success', 'Order Status Successfully Updated');
    }


    public function delete_order_status_db(Request $request)
    {
        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $orderStatus = OrderStatus::find($request->id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete Order Status ( ' . " $orderStatus->status_type" . ' )';
        $activity->role = $admin->role;
        $activity->save();

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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Create Booking Size ( ' . " $request->booking_size" . ' )';
        $activity->role = $admin->role;
        $activity->save();

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

        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Edit Booking Size ( ' . " $request->booking_size" . ' )';
        $activity->role = $admin->role;
        $activity->save();

        return redirect()->route('admin.bookingSize')->with('success', 'Booking Size Successfully Updated');
    }

    public function delete_booking_size_db(Request $request)
    {
        $bookingSize = BookingSize::find($request->id);
        $admin_id = session()->get('admin_id');
        $admin = Admin::find($admin_id);

        $activity = new AdminActivity;
        $activity->username = $admin->admin;
        $activity->admin_activity = 'Delete Booking Size ( ' . " $bookingSize->booking_size" . ' )';
        $activity->role = $admin->role;
        $activity->save();

        BookingSize::where('id', $request->id)->delete();

        return redirect()->route('admin.bookingSize')->with('success', 'Booking Size Successfully Deleted');
    }


    public function order_history()
    {
        $title = "Order History";
        $orders = Orders::where('status', 1)->with('tracking')->get();
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
                session()->put("role", $check->role);

                $activity = new AdminActivity;
                $activity->username = $check->admin;
                $activity->admin_activity = 'Login';
                $activity->role = $check->role;
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
        $activity->role = $admin->role;
        $activity->admin_activity = 'Logout';
        $activity->save();

        session()->forget("admin_id");
        session()->forget("role");

        return redirect()->route("admin.login")->with("success", "Loggedout successfully !");
    }
}
