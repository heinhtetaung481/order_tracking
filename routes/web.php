<?php

use App\Models\DeliveryInformation;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order', function () {
    return Order::all();
});

Route::get('/delivery', function() {
    return DeliveryInformation::all();
});
