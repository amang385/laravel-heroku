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
    return redirect()->route('login');
});

Route::get('/theme', function () {
    return view('theme');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/portal/classroom', 'ClassroomController@index')->name('classroom');
    // Route::get('portal/classroom', 'ClassroomController@index')->name('classroom');
    Route::get('/portal/classroom/{id}/teaching', 'ClassroomController@show')->name('teaching');
    Route::get('/portal/classroom/{id}/teaching/create', 'TeachingController@create')->name('teaching.create');
    Route::post('/portal/teaching/store', 'TeachingController@store')->name('teaching.store');
});
//Route for admin
Route::group(['prefix' => 'portal'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'portal\AdminController@index')->name('dashboard');
        Route::get('/classroom/create', 'ClassroomController@create')->name('classroom.create');
        Route::post('/classroom/store', 'ClassroomController@store')->name('classroom.store');
    });
});
