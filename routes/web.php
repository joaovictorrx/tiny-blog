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

Route::get('/', 'MainController@index')->name('blog-home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminController@index')->name('dashboard');
  Route::get('/posts', 'AdminController@index');

  Auth::routes();
}); 