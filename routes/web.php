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
Route::get('/', 'RecruitmentController@index');
Route::get('/recrutation', 'RecruitmentController@index')->name('recrutation');
Route::get('/download', 'RecruitmentController@download')->name('download');
Route::get('/about', function(){
    return view('about');
})->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
