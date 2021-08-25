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

// Route::get('/', function () {
//     return view('welcome');
// });


          

Route::group(['prefix'=>'create-user'], function () {
    Route::get('/', 'App\Http\Controllers\admin\UserController@user')->name('user');
    Route::post('/ajax-update-user','App\Http\Controllers\admin\UserController@ajaxUpdateUser');
   
});  

Route::group(['prefix'=>'department'], function () {
    Route::get('/', 'App\Http\Controllers\admin\UserController@department')->name('department');
    Route::post('/ajax-update-department','App\Http\Controllers\admin\UserController@ajaxUpdateDepartment');
    
});  

Route::group(['prefix'=>'designation'], function () {
    Route::get('/', 'App\Http\Controllers\admin\UserController@designation')->name('designation');
    Route::post('/ajax-update-designation','App\Http\Controllers\admin\UserController@ajaxUpdateDesignation');
    
});       


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('/search', 'App\Http\Controllers\HomeController@search');