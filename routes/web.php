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

Route::view('/', 'welcome');

Route::get('products', 'ProductController@index');

Route::get('cart/{id}', 'ProductController@cart')->name('cart');

Route::get('checkout', 'ProductController@checkout')->name('checkout');

Route::get('specials', 'ProductController@specials');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('review', 'ReviewController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
