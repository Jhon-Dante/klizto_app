<?php

use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ShopController;


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