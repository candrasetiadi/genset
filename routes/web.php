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
Route::get('/', 'Client\LandingController@index')->name('landing');
Route::get('/about', 'Client\LandingController@about')->name('about');
Route::get('/service', 'Client\LandingController@service')->name('service');
Route::get('/contact', 'Client\LandingController@contact')->name('contact');
	// return view('welcome');

Route::get('/admin', function () {
    return view('auth/login');
});

Route::get('/home', function () {
    return redirect('/admin/home');
});

// Route::get('/admin/register', 'Auth\RegisterController@registration')->name('register');

Route::get('/admin/register', function () {
    return view('auth/register');
});

Route::prefix('admin')->group(function () {

	Route::get('home', 'Admin\HomeController@index')->name('home');
	Route::get('users', 'Admin\UserController@index')->name('users');
	Route::get('users/profile/{id}', ['as' => 'users.profile', 'uses' => 'Admin\UserController@profile']);
	Route::patch('users/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UserController@update']);
	Route::get('users/role/{id}/edit', ['as' => 'users.editRole', 'uses' => 'Admin\UserController@editRole']);
	Route::patch('users/role/{id}/update', ['as' => 'users.updateRole', 'uses' => 'Admin\UserController@updateRole']);

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
	Route::resource('double-check', 'Admin\DoubleCheckController');
	Route::get('rent/{id}/doubleCheck', ['as' => 'rent.doubleCheck', 'uses' => 'Admin\DoubleCheckController@update']);
	Route::get('rent/{id}/delete', ['as' => 'rent.delete', 'uses' => 'Admin\RentController@destroy']);
	Route::post('rent/detail', ['as' => 'rent.storeDetail', 'uses' => 'Admin\RentController@storeDetail']);
	Route::patch('rent/detail/{id}/update', ['as' => 'rent.updateDetail', 'uses' => 'Admin\RentController@updateDetail']);

	Route::get('refeerContainer/report', ['as' => 'rent.refeerContainer', 'uses' => 'Admin\RentController@refeerContainer']);
	Route::get('refeerContainer/weekly-report', ['as' => 'rent.weeklyReport', 'uses' => 'Admin\RentController@weeklyReport']);

	Route::get('rent/{id}/setStatus', ['as' => 'rent.setStatus', 'uses' => 'Admin\RentController@setStatus']);

	// //fuel
	Route::resource('fuelUsage', 'Admin\FuelUsageController');
	Route::get('fuelUsage/{id}/delete', ['as' => 'fuelUsage.delete', 'uses' => 'Admin\FuelUsageController@destroy']);
	Route::get('fuelUsage/getStock', ['as' => 'fuelUsage.getStock', 'uses' => 'Admin\FuelUsageController@getStock']);

	// //fuel stock
	Route::resource('fuelStock', 'Admin\FuelStockController');
	Route::get('fuelStock/{id}/delete', ['as' => 'fuelStock.delete', 'uses' => 'Admin\FuelStockController@destroy']);

	// //landing
	Route::resource('configuration', 'Admin\LandingController');
	Route::get('landing/{id}/delete', ['as' => 'landing.delete', 'uses' => 'Admin\LandingController@destroy']);

	// //landing services
	Route::resource('service', 'Admin\ServiceController');

	// //invoice
	Route::resource('invoice', 'Admin\InvoiceController');
	Route::get('invoice/{id}/delete', ['as' => 'invoice.delete', 'uses' => 'Admin\InvoiceController@destroy']);
	Route::post('invoice/detail', ['as' => 'invoice.storeDetail', 'uses' => 'Admin\InvoiceController@storeDetail']);
	Route::get('invoice/textNumber', ['as' => 'invoice.textNumber', 'uses' => 'Admin\InvoiceController@textNumber']);

	Route::get('invoice/{id}/setStatus', ['as' => 'invoice.setStatus', 'uses' => 'Admin\InvoiceController@setStatus']);

	// //spka
	Route::resource('spka', 'Admin\SpkaController');
	Route::get('spka/{id}/delete', ['as' => 'spka.delete', 'uses' => 'Admin\SpkaController@destroy']);

	Route::get('container/{id}/get','Admin\ContainerController@getByShip');
	

	//export PDF
	Route::get('fuelUsage/{id}/exportpdf', ['as' => 'fuelUsage.exportpdf', 'uses' => 'Admin\FuelUsageController@generatePdf']);
	Route::get('invoice/{id}/exportpdf', ['as' => 'invoice.exportpdf', 'uses' => 'Admin\InvoiceController@generatePdf']);

	Route::get('spka/{id}/exportpdf', ['as' => 'spka.exportpdf', 'uses' => 'Admin\SpkaController@generatePdf']);

	Route::post('rent/exportpdf', ['as' => 'rent.exportpdf', 'uses' => 'Admin\RentController@generatePdf']);
	Route::post('weeklyReport/exportpdf', ['as' => 'rent.weeklyPdf', 'uses' => 'Admin\RentController@weeklyGeneratePdf']);

	//send email
	Route::get('invoice/{id}/mail', ['as' => 'invoice.mail', 'uses' => 'Admin\InvoiceController@sendMail']);

	Route::get('rent/{id}/mail', ['as' => 'rent.mail', 'uses' => 'Admin\RentController@sendMail']);
});

Auth::routes();


