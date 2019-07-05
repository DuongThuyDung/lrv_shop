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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','namespace' => '\App\Modules'], function(){
    Route::get('/register', "Common\Dashboard\Controllers\CommonController@GetRegister")->name('admin-register');
    Route::post('/register', "Common\Dashboard\Controllers\CommonController@PostRegister");
    Route::get('/login', "Common\Dashboard\Controllers\CommonController@GetLogin")->name('login')->middleware('CheckLogin');
    Route::post('/login', "Common\Dashboard\Controllers\CommonController@PostLogin");
});  
