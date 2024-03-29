<?php

use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {
    Alert::success('WELCOME', 'Complaint Management System');

    return view('welcome');
});

Route::get('/register', 'User\RegisterController@create')->name('register');

Route::post('/register', 'User\RegisterController@store');

Route::get('/login', 'User\LoginController@create')->name('login');

Route::post('/login', 'User\LoginController@store');

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/logout', 'User\LoginController@destroy')->name('logout');

Route::get('/tickets', 'User\TicketController@all')->name('tickets');

Route::get('/ticket/{ticketId}', 'User\TicketController@find');

Route::get('/service', 'User\ServiceController@create')->name('service');

Route::post('/service-request', 'User\ServiceController@store')->name('service-request');

Route::get('/get-service-categories/{category}', 'User\ServiceDropdownController@subcategories');// AJAX Route

Route::get('/get-service-departments/{block}', 'User\ServiceDropdownController@departments');// AJAX Route

Route::get('/get-service-floors/{department}', 'User\ServiceDropdownController@floors');// AJAX Route

Route::get('/get-service-rooms/{block}/{department}/{floor}', 'User\ServiceDropdownController@rooms');// AJAX Route

Route::get('/ticket-details/{ticketId}', 'User\TicketController@index');

Route::get('/service-action/{serviceActionId}', 'User\ServiceActionController@index');

Route::post('/service-action/{serviceId}', 'User\ServiceActionController@create');

Route::get('/service-details/{serviceId}', 'User\ServiceController@index');

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

Route::post('/service-approval/{serviceId}', 'User\ServiceApprovalController@create');

Route::get('/role-permission-delete/{roleId}/{permissionId}', 'User\RolePermissionController@destroy');

Route::get('/role-delete/{roleId}', 'User\RoleController@destroy');

Route::post('/role-permissions-edit/{roleId}', 'User\RolePermissionController@create');

Route::get('/permission-delete/{permissionId}', 'User\PermissionController@destroy');

Route::get('/consumable', 'User\ConsumableController@create')->name('consumable');

Route::get('/capital-equipment', 'User\CapitalEquipmentController@create')->name('capital-equipment');

Route::get('/hall-booking', 'User\HallBookingController@create')->name('hall-booking');

Route::get('intellisense', function () {
    return view('user.intellisense');
});

Route::get('/ticket-feedback', 'User\TicketFeedbackController@create')->name('ticket-feedback');

Route::post('/ticket-feedback', 'User\TicketFeedbackController@store');

Route::get('/feedbacks', 'User\FeedbacksController@all');

Route::get('/close-ticket/{ticketId}', 'User\TicketController@close');

Route::post('/work-history/{serviceActionId}', 'User\WorkHistoryController@store');

Route::post('/set-user-active/{userId}/{active}', 'User\UserController@setActive');//AJAX Route

Route::get('/spendings-overview', 'HomeController@spendingsOverview'); // AJAX Route

Route::get('/tickets-composition', 'HomeController@ticketsComposition'); // AJAX Route

Route::get('/mark-all-read', 'HomeController@markAllRead');

Route::get('/analysis', 'User\AnalysisController@index');

Route::get('/statistics', 'User\StatisticsController@index');



/* ------------------------------------------------------------------------------------------------

                                TESTING ROUTE

// DO NOT CODE HERE
--------------------------------------------------------------------------------------------------- */

use App\Worker;
use App\Algorithms\Hungarian;
use App\User;

Route::get('/test', function () {

    $workers = Worker::limit(6)->get();

    $workerTATs = $workers->map(function ($item, $key) {

        return [
            $item->tat_Painting,
            $item->tat_Plumbing,
            $item->tat_HouseKeeping,
            $item->tat_Airconditioner,
            $item->tat_Electrical,
            $item->tat_Interior
        ];
    });

    $hungarian = new Hungarian($workerTATs->toArray());

    $hungarianSolution = $hungarian->solve();

    $user = User::first();
    $worker = Worker::first();
//    return $workers[$hungarianSolution[1]];

    return $worker->user->name;

});

