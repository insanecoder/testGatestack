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

Route::get('/admin/testSeries/{userName}/{password}',['uses'=>'TestController@createTestSeries','as'=>'createTestSeries']);

Route::post('/admin/testSeries/submit',['uses'=>'TestController@saveTestSeries','as'=>'saveTestSeries']);

Route::get('/admin/questionSeries/{userName}/{password}',['uses'=>'TestController@createQuestion','as'=>'createQuestion']);

Route::post('/admin/question/submit',['uses'=>'TestController@saveQuestion','as'=>'submitQuestion']);

Route::post('/getQuestion',['uses'=>'QuestionController@getQuestion','as'=>'getQuestion']);

Route::any('/getTestStatus',['uses'=>'TestController@getTestStatus','as'=>'getTestStatus']);

Route::any('/saveTestStatus',['uses'=>'TestController@saveTestStatus','as'=>'saveTestStatus']);