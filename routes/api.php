<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return User::latest();
// });

// Route::get('/order', function(Request $request) {
//     $order = Order::all();
//     return $order;
// });

Route::controller(OrdersController::class)->group(function () {
    Route::post('/order', 'create');
    Route::get('/order/get_all_records', 'index');
    Route::get('/order/{order:order_code}', 'show');
});
