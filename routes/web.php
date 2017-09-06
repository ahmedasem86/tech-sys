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
use App\Customer;
use App\Product;


Route::get('/', 'CustomerController@home');
Route::get('/index', 'CustomerController@index');
Route::get('/customer/{id}', 'CustomerController@show');
Route::get('/customers/create','CustomerController@create' );
Route::post('/customer/store', 'CustomerController@store' );
Route::get('/products', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/products/create','ProductController@create' );
Route::post('/product/preview','ProductController@preview' );
Route::get('/products/store','ProductController@store' );
Route::get('/ispaid/{id}','InstalmentController@ispaid' );
Route::get('/claim-now','InstalmentController@claim' );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
