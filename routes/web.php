<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('/transaksi', TransaksiController::class);
Route::get('/', [OrderController::class, 'index']);
Route::post('/checkout',[ OrderController::class,'checkout']);