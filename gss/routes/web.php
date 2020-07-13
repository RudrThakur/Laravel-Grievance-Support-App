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

Route::get('/register', 'User\RegisterController@create')->name('register');

Route::post('/register', 'User\RegisterController@store');

Route::get('/login', 'User\LoginController@create')->name('login');

Route::post('/login', 'User\LoginController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'User\LoginController@destroy');

Route::get('/tickets', 'User\TicketController@all')->name('tickets');

Route::get('/service', 'User\ServiceController@create')->name('service');

Route::post('/service-request', 'User\ServiceController@store')->name('service-request');

Route::get('/get-service-categories/{category}', 'User\ServiceDropdownController@subcategories');

Route::get('/get-service-departments/{block}', 'User\ServiceDropdownController@departments');

Route::get('/get-service-floors/{department}', 'User\ServiceDropdownController@floors');

Route::get('/get-service-rooms/{block}/{department}/{floor}', 'User\ServiceDropdownController@rooms');

Route::get('/index', 'User\UserController@index')->name('index');

Route::get('/ticket-details/{ticketId}', 'User\TicketController@details');

Route::post('/service-action/{serviceId}', 'User\ServiceController@action');

Route::get('/service-action/{serviceId}', 'User\ServiceController@index');
