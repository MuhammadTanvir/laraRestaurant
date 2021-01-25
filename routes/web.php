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



Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::post('/reservation', 'ReservationController@reservation')->name('reserve');
Route::post('/contact_us', 'ContactController@contact_us')->name('contact');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>'auth'], function () {
	Route::get('/', 'Backend\Dashboard\DashboardController@index')->name('dashboard');
	Route::resource('/slider', 'Backend\Slider\SliderController');
	Route::resource('/category', 'Backend\Category\CategoryController');
	Route::resource('/item', 'Backend\Item\ItemController');
	Route::get('/reservation', 'Backend\ReservationController@reservations')->name('reservations.index');
	Route::post('/confirm_reservation/{id}', 'Backend\ReservationController@reservation_status')->name('reservation.status');
	Route::get('/contact_lists', 'Backend\ContactController@contact_lists')->name('contact_lists');
	Route::get('/show_contact_details/{id}', 'Backend\ContactController@contact_details')->name('contact_details.show');
	Route::post('/contact_destroy/{id}', 'Backend\ContactController@contact_destory')->name('contact_destroy');


});

