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

Route::get('/', 'ProductController@index')->name('products.list');
Route::get('/checkout/{product}', 'ProductController@checkout')->name('product.checkout');
Route::post('/create/order/{product}', 'ProductController@createOrder')->name('create.order');
