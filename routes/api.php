<?php

use App\Http\Controllers\DataStoresController;
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

Route::controller(DataStoresController::class)->group(function () {
    Route::post('/object', 'create');
    Route::get('/object/get_all_records', 'index');
    Route::get('/object/{key}', 'show');
});
