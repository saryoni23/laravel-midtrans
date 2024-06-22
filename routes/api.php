<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/midtrans-callback', [App\Http\Controllers\Api\PostController::class, 'callback']);
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
