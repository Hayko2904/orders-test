<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders', 'OrderController@index')->name('get_orders');
Route::post('orders', 'OrderController@store')->name('store_order');
Route::delete('orders/{id}', 'OrderController@destroy')->name('destroy_order');
Route::put('orders', 'OrderController@update')->name('update_order');
