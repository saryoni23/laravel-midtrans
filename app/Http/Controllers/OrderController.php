<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function checkout(Request $request)
    {
        $request->request->add(['total_price' => $request->qty * 1000, 'status' => 'unpaid']);
        $order = Order::create($request->all());
        // return dd($request->all());

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        //Override Notification URL
        \Midtrans\Config::$overrideNotifUrl = config('app.url').'/api/midtrans-callback';


        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name'    => $order->name,
                'last_name'     => '',
                'phone' =>$order->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return dd($snapToken);
        return view('checkout',compact ('snapToken','order'));

    }
    
}
