<?php

use App\Http\Controllers\Buyer\PublicationsController;
use App\Http\Controllers\Buyer\PremisesController;
use App\Http\Controllers\Buyer\EmployeesController;


Route::get('get/publications',[PublicationsController::class, 'get'])->name('get_publications');
Route::get('get/ServiceEmployees/{service_id}',[EmployeesController::class, 'getServiceEmployees']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('premises', PremisesController::class);
	Route::resource('publications', PublicationsController::class);
	//
	Route::resource('employess', EmployeesController::class);
});