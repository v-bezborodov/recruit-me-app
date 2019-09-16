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
Route::get('/', 'RecruitmentController@index')->middleware('auth');
//Route::get('/recrutation', 'RecruitmentController@index')->name('recrutation')->middleware('auth');
Route::get('/download', 'RecruitmentController@download')->name('download')->middleware('auth');
Route::get('/about', function(){
    return view('about');
})->name('about')->middleware('auth');

//Route::resource('/recruitment', 'RecruitmentController');
Route::resource('/user', 'UserController');

Route::group(['prefix' => 'manage', 'middleware' => 'auth'], function () {
    Route::resource('/', 'Manage\Manage');
    Route::resource('/profile', 'Manage\ProfileController');
//    Route::get('/profile', 'RecruitmentController@profile');
    Route::resource('/recrutation', 'Manage\Recrutation');
    Route::get('/recrutation-all', 'Manage\Recrutation@getAllRecrutation');
//    Route::resource('/recrutation-flow', 'Manage\Recrutation');

});



//Route::resource('/categories', 'CategoryController');
//Route::get('/profile', 'RecruitmentController@profile')->name('profile')->middleware('auth');
Route::post('/formsubmit', 'UserController@update')->name('updateUser')->middleware('auth');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
