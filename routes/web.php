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
/*
Route::get('/', function () {
=======

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/cari', 'HomeController@cari');
Route::get('/catering', 'CateringController@catering');
Route::get('/menu', 'CateringController@menu');
Route::get('/logout', 'Auth\LoginController@logout');

// CATERING
Route::get('/dashboard/pesanan/', 'Catering\PesananController@index');
Route::get('/dashboard/menu/', 'Catering\MenuController@index');
Route::get('/dashboard/menu/{id}', 'Catering\MenuController@detail');
Route::post('/dashboard/menu/addMenu/', [
    'as' => 'addMenu', 'uses' => 'Catering\MenuController@addMenu']);
Route::post('/dashboard/menu/{id}/deleteMenu', 'Catering\MenuController@deleteMenu');

// Item
Route::get('/dashboard/item/', 'Catering\ItemController@index');
Route::post('/dashboard/item/addItem/', [
    'as' => 'addItem', 'uses' => 'Catering\ItemController@addItem']);
Route::post('/dashboard/item/{id}/updateItem', 'Catering\ItemController@updateItem');
Route::post('/dashboard/item/{id}/deleteItem', 'Catering\ItemController@deleteItem');
//Route::patch('/dashboard/item/updateItem/{id}', 'Catering\ItemController@updateItem');
