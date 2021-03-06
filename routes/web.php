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

Auth::routes();

// USER
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/cari', 'HomeController@cari');
Route::post('/cariTerdekat', 'HomeController@cariTerdekat');
Route::get('/cateringBaru', 'UserController@activateCatering');
Route::post('/cateringBaru', 'UserController@activateCatering');

Route::get('/catering/{id}', 'CateringController@catering');
Route::get('/menu/{id}', 'CateringController@menu');
Route::get('/profile', 'UserController@profile');
Route::post('/profile/update', 'UserController@update');
Route::post('/checkout', 'TransaksiController@addToCart');

Route::get('/pesanan', 'PesananController@index');
Route::post('/pesanan/bayar', 'PesananController@bayar');
Route::get('/pesanan/diterima/{id}', 'PesananController@diterima');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/cari?q={{pencarian}}', 'HomeController@cari');

// CATERING - PROFILR
Route::get('/dashboard/profile', 'UserController@profileCatering');
Route::post('/dashboard/profile/update_catering', 'UserController@updateCatering');

// CATERING - PESANAN
Route::get('/dashboard/pesanan/', 'Catering\PesananController@index');
Route::get('/dashboard/pesanan/dikirim/{id}', 'Catering\PesananController@dikirim');
Route::get('/dashboard/pesanan/detailPesanan/', 'Catering\PesananController@detailPesanan');

// CATERING - MENU
Route::get('/dashboard/menu/', 'Catering\MenuController@index');
Route::get('/dashboard/menu/{id}', 'Catering\MenuController@detail');
Route::post('/dashboard/menu/addMenu/', ['as' => 'addMenu', 'uses' => 'Catering\MenuController@addMenu']);
Route::post('/dashboard/menu/{id}/updateMenu', 'Catering\MenuController@updateMenu');
Route::post('/dashboard/menu/{id}/deleteMenu', 'Catering\MenuController@deleteMenu');
Route::post('/dashboard/menu/tambahGambar', 'Catering\MenuController@tambahGambar');
Route::post('/dashboard/menu/updateGambar', 'Catering\MenuController@updateGambar');

// CATERING - MENU ITEM
Route::post('/dashboard/menu/addMenuItem/', ['as' => 'addMenuItem', 'uses' => 'Catering\MenuController@addMenuItem']);
Route::post('/dashboard/menu/{id}/deleteMenuItem', 'Catering\MenuController@deleteMenuItem');
Route::post('/dashboard/menu/{id}/updateMenuItem', 'Catering\MenuController@updateMenuItem');
Route::post('/dashboard/menu/{id}/updateHargaMenu', 'Catering\MenuController@updateHargaMenu');

// CATERING - ITEM
Route::get('/dashboard/item/', 'Catering\ItemController@index');
Route::post('/dashboard/item/addItem/', ['as' => 'addItem', 'uses' => 'Catering\ItemController@addItem']);
Route::post('/dashboard/item/{id}/updateItem', 'Catering\ItemController@updateItem');
Route::post('/dashboard/item/{id}/deleteItem', 'Catering\ItemController@deleteItem');
