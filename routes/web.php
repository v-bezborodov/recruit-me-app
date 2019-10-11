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

Route::get('/', 'HomeController@index')->middleware('auth');
//Route::get('/recrutation', 'RecruitmentController@index')->name('recrutation')->middleware('auth');
//Route::get('/download', 'RecruitmentController@download')->name('download')->middleware('auth');
Route::get('/about', function(){
    return view('about');
})->name('about')->middleware('auth');

//Route::resource('/recruitment', 'RecruitmentController');
Route::resource('/user', 'UserController');

Route::group(['prefix'=>'manage', 'middleware'=>['auth'], 'namespace'=>'Manage'], function () {
    Route::resource('/', 'ManageController');
    Route::resource('profile', 'ProfileController');
//    Route::get('/profile', 'RecruitmentController@profile');
    Route::resource('/recrutation', 'RecrutationController');
    Route::get('recrutation-all', 'RecrutationController@getAllRecrutation');
    Route::get('download', 'RecrutationController@download')->name('download');
//    Route::resource('/recrutation-flow', 'Manage\Recrutation');

});



//Route::resource('/categories', 'CategoryController');
//Route::get('/profile', 'RecruitmentController@profile')->name('profile')->middleware('auth');
Route::post('/formsubmit', 'UserController@update')->name('updateUser')->middleware('auth');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
