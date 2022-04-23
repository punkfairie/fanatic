<?php

use App\Http\Controllers\CollectiveController;
use App\Http\Controllers\JoinedController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('guest')->group(function () {
	//Route::get('/', [])
	Route::get('/fanatic/install', [CollectiveController::class, 'create'])
	     ->name('collectives.create');
	Route::post('/fanatic', [CollectiveController::class, 'store'])->name('collectives.store');
});

Route::middleware('auth')->group(function () {
	Route::get('/fanatic', [CollectiveController::class, 'dashboard'])->name('dashboard');

	Route::resource('joined', JoinedController::class);
});
