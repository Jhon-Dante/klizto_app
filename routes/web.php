<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\PublicationsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\PremisesController;
use App\Http\Controllers\Admin\ShopController;


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

});

Route::group(['middleware' => 'auth'], function () {

	Route::resource('account',AccountController::class);
	Route::resource('wallet', WalletController::class);
	//Publicaciones
	Route::resource('publications', PublicationsController::class);

	Route::resource('shop', ShopController::class);
	//Negocios
	Route::get('premises', [PremisesController::class, 'index'])->name('premises');
	Route::get('premises/create', [PremisesController::class, 'create'])->name('premises/create');
	//Admin
	Route::get('settings', [SettingsController::class, 'index'])->name('settings');
});

include "admin.php";