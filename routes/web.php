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

Route::get('/admin', function () {

    return view('auth/login');
});

Route::get('/admin/register', function () {

    return view('auth/register');
});

Route::prefix('admin')->group(function () {

	Route::get('home', 'Admin\HomeController@index')->name('home');
	Route::get('users', 'Admin\UserController@index')->name('users');
	Route::get('users/profile/{id}', ['as' => 'users.profile', 'uses' => 'Admin\UserController@profile']);
	Route::patch('users/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UserController@update']);

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	//Customer
	Route::resource('customer', 'Admin\CustomerController');
	Route::get('customer/{id}/delete', ['as' => 'customer.delete', 'uses' => 'Admin\CustomerController@destroy']);

	//container
	Route::resource('container', 'Admin\ContainerController');
	Route::get('container/{id}/delete', ['as' => 'container.delete', 'uses' => 'Admin\ContainerController@destroy']);

	// //generator
	Route::resource('generator', 'Admin\GeneratorController');
	Route::get('generator/{id}/delete', ['as' => 'generator.delete', 'uses' => 'Admin\GeneratorController@destroy']);

	// //ship
	Route::resource('ship', 'Admin\ShipController');
	Route::get('ship/{id}/delete', ['as' => 'ship.delete', 'uses' => 'Admin\ShipController@destroy']);

	// //field
	Route::resource('field', 'Admin\FieldController');
	Route::get('field/{id}/delete', ['as' => 'field.delete', 'uses' => 'Admin\FieldController@destroy']);

	// //rent
	Route::resource('rent', 'Admin\RentController');
	Route::get('rent/{id}/delete', ['as' => 'rent.delete', 'uses' => 'Admin\RentController@destroy']);
	Route::post('rent/detail', ['as' => 'rent.storeDetail', 'uses' => 'Admin\RentController@storeDetail']);

	// //rent
	Route::resource('fuelUsage', 'Admin\FuelUsageController');
	Route::get('fuelUsage/{id}/delete', ['as' => 'fuelUsage.delete', 'uses' => 'Admin\FuelUsageController@destroy']);

	// //invoice
	Route::resource('invoice', 'Admin\InvoiceController');
	Route::get('invoice/{id}/delete', ['as' => 'invoice.delete', 'uses' => 'Admin\InvoiceController@destroy']);
	Route::post('invoice/detail', ['as' => 'invoice.storeDetail', 'uses' => 'Admin\InvoiceController@storeDetail']);

	Route::get('container/{id}/get','Admin\ContainerController@getByShip');
	
});

Auth::routes();


