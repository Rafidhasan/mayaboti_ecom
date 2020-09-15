<?php

use Illuminate\Support\Facades\Route;

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

//admin routes
Route::get('/admin', 'AdminController@index')->middleware('admin')->name('adminHome');
Route::post('/live_start', 'LiveController@create')->middleware('admin');
Route::get('/lives', 'LiveController@index')->middleware('admin')->name('live_list');
Route::get('/lives/{id}', 'LiveController@show')->middleware('admin');
Route::get('/search', 'LiveController@search')->middleware('admin');
Route::get('/delete/{product_id}/{live_id}', 'LiveController@delete')->middleware('admin');
Route::get('/order_confirm/{user_id}/{products_id}', 'OrderController@show')->middleware('admin')->name('singleOrderPage');
Route::post('/order_confirm/{user_id}','InvoiceController@create')->middleware('admin');
Route::get('/showInvoice/{user_id}/{serial}','InvoiceController@show')->middleware('admin');
//user routes
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/products/{id}', 'ProductController@insert');

