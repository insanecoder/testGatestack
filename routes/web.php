<?php

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

Route::get('/buy-test', function () {
    return view('test/buyTest');
});

Route::post('/makePayment',['uses'=>'PaymentController@makePayment','as'=>'makePayment']);

Route::any('/payment-success',['uses'=>'PaymentController@paymentSuccess','as'=>'sucessPayment']);

Route::post('/create-order',['uses'=>'PaymentController@createOrder','as'=>'createOrder']);