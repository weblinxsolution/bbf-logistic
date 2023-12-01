<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function fakeAdmin()
    {
        $new = new Admin;
        $new->email = "admin@gmail.com";
        $new->password = Hash::make(123456789);
        $new->save();

        return 'Admin Created';
    }

    public function dashboard()
    {
        $title = "Dashboard";
        $data = compact('title');
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
            return redirect()->back()->with('error', 'User Already Register');
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->number = $request->number;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'User Successfully Register');
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
        $orders = Orders::all();
        $data = compact('title', 'orders');
        return view('admin.order-management')->with($data);
    }

    public function add_order()
    {
        $title = "Add Order";
        $data = compact('title');
        return view('admin.add-order')->with($data);
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
        $data = compact('title');
        return view('admin.admin-activity')->with($data);
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
        $data = compact('title');
        return view('admin.shipping-type')->with($data);
    }
    public function edit_shipping_type()
    {
        $title = "Edit Shipping Type";
        $data = compact('title');
        return view('admin.edit-shipping-type')->with($data);
    }

    public function order_status()
    {
        $title = "Order Status";
        $data = compact('title');
        return view('admin.order-status')->with($data);
    }

    public function add_order_status()
    {
        $title = "Add Order Status";
        $data = compact('title');
        return view('admin.add-order-status')->with($data);
    }

    public function edit_order_status()
    {
        $title = "Edit Order Status";
        $data = compact('title');
        return view('admin.edit-order-status')->with($data);
    }

    public function booking_size()
    {
        $title = "Booking Size";
        $data = compact('title');
        return view('admin.booking-size')->with($data);
    }

    public function add_booking_size()
    {
        $title = "Add Booking Size";
        $data = compact('title');
        return view('admin.add-booking-size')->with($data);
    }

    public function edit_booking_size()
    {
        $title = "Edit Booking Size";
        $data = compact('title');
        return view('admin.edit-booking-size')->with($data);
    }

    public function order_history()
    {
        $title = "Order History";
        $data = compact('title');
        return view('admin.order-history')->with($data);
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
                return redirect()->route("admin.dashboard");
            } else {

                return redirect()->back()->with("error", "Please provide valid credentials.");
            }
        } else {

            return redirect()->back()->with("error", "Please provide valid credentials.");
        }
    }
}