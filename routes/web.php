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
<<<<<<< HEAD
/*
Route::get('/', function () {
=======

/*Route::get('/', function () {
>>>>>>> 6a74895de58ac2ae26c11e406b1531fc925eea9f
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');
<<<<<<< HEAD
Route::get('/home', 'HomeController@index');
=======
>>>>>>> 6a74895de58ac2ae26c11e406b1531fc925eea9f
Route::get('/cari', 'HomeController@cari');
Route::get('/catering', 'CateringController@catering');
Route::get('/menu', 'CateringController@menu');
