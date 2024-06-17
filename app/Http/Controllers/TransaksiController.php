<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

   
    public function checkout(Request $request){

        $request->request->add(['total_price' => $request->qty * 1000, 'status' => 'unpaid']);
        dd($request->all());
    }
}
