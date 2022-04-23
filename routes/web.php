<?php

use App\Http\Controllers\CollectiveController;
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

Route::get('/fanatic', [CollectiveController::class, 'dashboard'])->name('dashboard');
Route::get('/fanatic/install', [CollectiveController::class, 'create'])->name('collectives.create');
Route::post('/fanatic', [CollectiveController::class, 'store'])->name('collectives.store');
