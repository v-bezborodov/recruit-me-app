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

//Route::get('/', function () {
//    return view('welcome');
//
//
//});

Route::get('/recrutation', 'FrontController@index')->name('recrutation');
Route::get('/download', 'FrontController@download')->name('download');
Route::get('/about', function(){
    return view('about');
})->name('about');
