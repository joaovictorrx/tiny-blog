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

Route::get('/', 'MainController@index')->name('blog.home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminController@index')->name('dashboard');
  
  Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'AdminController@index');

    Route::get('/novo-post', 'PostController@create')->name('new.post');
    Route::post('/store', 'PostController@store')->name('store.post');
    Route::get('/editar-post/{post}', 'PostController@edit')->name('edit.post');
    Route::post('/update/{post}', 'PostController@update')->name('update.post');
    Route::post('/destroy/{post}', 'PostController@destroy')->name('destroy.post');

  });

  Auth::routes();
}); 