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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
	// CRUD productos
	Route::get('products', 'ProductController@index');
	Route::get('products/create', 'ProductController@create');
	Route::post('products', 'ProductController@store');
	
	// Edit products
	Route::get('products/{id}/edit','ProductController@edit');
	Route::post('products/{id}/edit','ProductController@update');

	// Delete products
	Route::post('products/{id}/delete','ProductController@destroy');  // ver va?: /delete
	//Route::delete('products/{id}','ProductController@destroy');		// form  eliminar

	// Edit products
	Route::get('products/{id}/images','ImageController@index');
	Route::post('products/{id}/images','ImageController@store');
	// Delete products
	Route::delete('products/{id}/images','ImageController@destroy');


	// Imagen favorita
	Route::get('Admin/products/{id}/images/select/{image}','ImageController@select');
});

