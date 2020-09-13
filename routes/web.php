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

Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::get('/admin', 'AdminController@index')->middleware('admin')->name('adminHome');
Route::post('/live_start', 'LiveController@create')->middleware('admin');
Route::get('/lives', 'LiveController@index')->middleware('admin')->name('live_list');
Route::get('/lives/{id}', 'LiveController@show')->middleware('admin')->name('live_list');
Route::get('/order_confirm/{id}', 'OrderController@show')->middleware('admin')->name('singleOrderPage');
Route::get('/search', 'LiveController@search')->middleware('admin');


//user routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/products/{id}', 'ProductController@insert');

