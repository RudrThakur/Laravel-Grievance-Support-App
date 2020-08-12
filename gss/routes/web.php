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

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/logout', 'User\LoginController@destroy')->name('logout');

Route::get('/tickets', 'User\TicketController@all')->name('tickets');

Route::get('/service', 'User\ServiceController@create')->name('service');

Route::post('/service-request', 'User\ServiceController@store')->name('service-request');

Route::get('/get-service-categories/{category}', 'User\ServiceDropdownController@subcategories');// AJAX Route

Route::get('/get-service-departments/{block}', 'User\ServiceDropdownController@departments');// AJAX Route

Route::get('/get-service-floors/{department}', 'User\ServiceDropdownController@floors');// AJAX Route

Route::get('/get-service-rooms/{block}/{department}/{floor}', 'User\ServiceDropdownController@rooms');// AJAX Route

Route::get('/ticket/{ticketId}', 'User\TicketController@detail');

Route::get('/ticket-details/{ticketId}', 'User\TicketController@index');

Route::get('/service-action/{serviceActionId}', 'User\ServiceActionController@index');

Route::post('/service-action/{serviceId}', 'User\ServiceActionController@create');// AJAX Route

Route::get('/service-details/{serviceId}/{ticketId}', 'User\ServiceController@index');

Route::post('/ticket-delete/{ticketId}', 'User\TicketController@destroy');// AJAX Route

Route::get('/create-role', 'User\RoleController@index');

Route::post('/create-role', 'User\RoleController@create');

Route::get('/manage-roles', 'User\RoleController@all');

Route::get('/create-permission', 'User\PermissionController@index');

Route::post('/create-permission', 'User\PermissionController@create');

Route::get('/manage-permissions', 'User\PermissionController@all');

Route::get('/create-user', 'User\UserController@index');

Route::post('/create-user', 'User\UserController@create');

Route::get('/manage-users', 'User\UserController@all');

Route::post('/user-permission-delete/{userId}/{permissionId}', 'User\UserPermissionController@destroy');// AJAX Route

Route::post('/user-permissions-edit/{userId}', 'User\UserPermissionController@create');// AJAX Route

Route::get('/profile-details', 'User\ProfileController@index');

Route::get('/edit-profile', 'User\ProfileController@create');

Route::post('/edit-profile', 'User\ProfileController@store');

Route::get('/account-settings', 'User\AccountSettingController@index');

Route::post('/account-delete/{userId}', 'User\AccountSettingController@destroy');

Route::post('/user-delete/{userId}', 'User\UserController@destroy');// AJAX Route
