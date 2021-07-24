<?php

use App\Http\Controllers\WalletController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ShopController;


//-------------------------

use App\Http\Controllers\Buyer\PublicationsController;
use App\Http\Controllers\Buyer\PremisesController;
use App\Http\Controllers\Buyer\EmployeesController;
use App\Http\Controllers\Buyer\BranchesController;


Route::group(['middleware' => 'auth'], function () {

	Route::resource('account', AccountController::class);
	Route::resource('wallet', WalletController::class);
	//Publicaciones
	

	Route::resource('shop', ShopController::class);
	//Negocios
	
	// Route::get('premises/create', [PremisesController::class, 'create'])->name('premises/create');
	//Admin
	Route::get('settings', [SettingsController::class, 'index'])->name('settings');
});


// ---------------------------------------


Route::get('get/branch_services/{service_id}',[BranchesController::class, 'getBranchesServices']);
Route::get('get/employess_branches/{branch_id}',[EmployeesController::class, 'gesEmployeesBranches']);
Route::get('get/publications',[PublicationsController::class, 'get'])->name('get_publications');
Route::get('get/ServiceEmployees/{service_id}',[EmployeesController::class, 'getServiceEmployees']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('premises', PremisesController::class);
	Route::resource('publications', PublicationsController::class);
	//
	Route::resource('employess', EmployeesController::class);
});