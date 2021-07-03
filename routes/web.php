<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AccountController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => 'auth'], function () {

	Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	    return Inertia::render('Dashboard');
	})->name('dashboard');

	Route::get('account',[AccountController::class, 'index'])->name('account');

	Route::get('wallet', [WalletController::class, 'index'])->name('wallet');

	//Publicaciones
	Route::resource('publications', PublicationsController::class)->middleware(['auth:sanctum', 'verified']);
	Route::inertia('/shop', 'ShopComponent');

	//Negocios
	Route::resource('premises', PremisesController::class)->middleware(['auth:sanctum', 'verified']);
	//Admin
	Route::get('settings', [SettingsController::class, 'index'])->name('settings');
});
include "admin.php";