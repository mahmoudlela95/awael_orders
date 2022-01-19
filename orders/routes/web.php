<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('layout.app');
});
Route::resource('users','App\Http\Controllers\userController');
Route::get('users-list','App\Http\Controllers\userController@usersList');
Route::get('/users/{id}/sdelete','App\Http\Controllers\userController@softdelete' );
Route::get('/users/{id}/restore','App\Http\Controllers\userController@restore' );
Route::get('dusers-list','App\Http\Controllers\userController@dusersList' );
Route::get('/deleted-users','App\Http\Controllers\userController@dindex' )->name('delusers');

Route::resource('orders','App\Http\Controllers\orderController');
Route::get('orders-list','App\Http\Controllers\orderController@ordersList');
Route::get('home','App\Http\Controllers\initController@index');
