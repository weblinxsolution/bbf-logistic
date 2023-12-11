<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderTracking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $tital = "Dashboard";
        $data = compact('tital');
        return view('user.index');
    }
    public function order_tracking(Request $request)
    {
        $tital = "Order Tracking";
        $data = compact('tital');
        return view('user.order-tracking');
    }


    public function order_tracking_invoice_db(Request $request)
    {
        $title = "Order Tracking Result";
        $user_id = session('user_id');
        $user = User::find($user_id);
        $orders = Orders::where('invoice_no', $request->invoice)->where('user_email_id', $user->id)->with('users', 'ordersType', 'orderStatus', 'containers')->first();
        if ($orders) {
            $tracking = OrderTracking::where('order_id', $orders->id)->get();
            if ($tracking) {
                $data = compact('title', 'orders', 'tracking');
                return view('user.order-tracking-detail')->with($data);
            } else {
                $data = compact('title');
                return redirect()->route('user.orderTracking')->with($data)->with('error', 'No Result Found');
            }
        } else {
            $data = compact('title');
            return redirect()->route('user.orderTracking')->with($data)->with('error', 'No Result Found');
        }

    }

    public function login()
    {
        $title = "Login";
        $data = compact('title');
        return view('user.login')->with($data);
    }

    public function login_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $check = User::where("email", $request->email)->first();

        if ($check) {

            if (Hash::check($request->password, $check->password)) {

                session()->put("user_id", $check->id);

                return redirect()->route("user.dashboard");
            } else {

                return redirect()->back()->with("error", "Please provide valid credentials.");
            }
        } else {

            return redirect()->back()->with("error", "Please provide valid credentials.");
        }
    }

    public function logout()
    {
        session()->forget("user_id");
        return redirect()->route("user.login")->with("success", "Loggedout successfully !");
    }
}
