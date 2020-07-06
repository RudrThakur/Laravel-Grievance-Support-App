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

Route::get('/user/index', 'Ticket\TicketController@index')->name('home');

Route::get('/user/services', 'Ticket\ServicesController@create');

Route::get('/get-service-categories/{category}', 'Dropdown\ServicesDropdownController@subcategories');