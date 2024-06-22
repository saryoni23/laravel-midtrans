<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function callback(Request $request,String $id){
        $serverKey   = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if($hashed== $request->signature_key){
            if($request->transaction_status =='capture' or $request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status'=>'paid']);
            }
        }
    }
    public function index(){
        $order = Order::all();

        return response()->json(['status' => true, 'data' => $order, 'message' => 'Get Data Success']);
    }


    public function store(StorePostRequest $request)
    {
        $order =Order::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'qty' => $request->qty,
            'total_price' => $request->qty * 1000,
            'status' => 'unpaid',
        ]);
        return response()->json(['status' => true, 'data' => $order, 'message' => 'save Data Success']);
    }
    public function update(StorePostRequest $request,String $id){
        $request->validated();

        $project = Order::find($id);
        $project->name = $request->name;
        $project->no_hp = $request->no_hp;
        $project->status = $request->status;
        $project->save();
        return response()->json($project);
        // return response()->json(['status' => true, 'data' => $order, 'message' => 'update Data Success']);

        }
        public function show($id)
        {
            //find post by ID
            $order = order::find($id);
    
            //return single post as a resource
            return response()->json(['status' => true, 'data' => $order, 'message' => 'Detail Data Success']);
        }
}
