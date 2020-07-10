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

Route::get('/register', 'Authentication\RegistrationController@create');

Route::post('/register', 'Authentication\RegistrationController@store');

Route::get('/login', 'Authentication\LoginController@create')->name('login');

Route::post('/login', 'Authentication\LoginController@store');

Route::get('/logout', 'Authentication\LoginController@destroy');

Route::get('/user/index', 'User\UserController@index');

Route::get('/user/active-tickets', 'Ticket\TicketController@active');

Route::get('/user/services', 'Ticket\ServicesController@create');

Route::post('/user/request-service', 'Ticket\ServicesController@store');

Route::get('/get-service-categories/{category}', 'Dropdown\ServicesDropdownController@subcategories');

Route::get('/get-service-departments/{block}', 'Dropdown\ServicesDropdownController@departments');

Route::get('/get-service-floors/{department}', 'Dropdown\ServicesDropdownController@floors');

Route::get('/get-service-rooms/{block}/{department}/{floor}', 'Dropdown\ServicesDropdownController@rooms');

Route::get('/service-details/{ticketId}', 'Ticket\TicketController@details');

Route::get('/admin/index', 'Admin\AdminController@index');

Route::get('/admin/tickets', 'Admin\AdminController@tickets');

Route::get('/admin/create-user', function () {
    return view('admin.create-user');
});
