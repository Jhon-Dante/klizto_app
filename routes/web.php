<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\BanksController;


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
})->name('/');

Route::group(['middleware' => 'auth'], function () {
	Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	    return Inertia::render('Admin/Dashboard');
	})->name('dashboard');

});

Route::get('get/services/{category_id}', [ServicesController::class, 'get']);
Route::get('get/categories', [CategoriesController::class, 'get'])->name('get_categories');
Route::get('get/banks', [BanksController::class, 'get'])->name('get_banks');


include "admin.php";
include "buyer.php";
