<?php

use App\Http\Controllers\CollectiveController;
use App\Http\Controllers\JoinedController;
use App\Http\Controllers\SessionsController;
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
Route::redirect('/fanatic', '/fanatic/login')->middleware('guest');

Route::middleware('guest')->group(function () {
    Route::get('/fanatic/login', [SessionsController::class, 'create'])
         ->name('admin.sessions.create');
    Route::get('/fanatic/install', [CollectiveController::class, 'create'])
         ->name('admin.collectives.create');
    Route::post('/fanatic', [CollectiveController::class, 'store'])
         ->name('admin.collectives.store');
});

Route::post('/fanatic', [SessionsController::class, 'store'])->name('admin.sessions.store');

Route::middleware('auth')->group(function () {
    Route::get('/fanatic', [CollectiveController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/fanatic', [SessionsController::class, 'destroy'])->name('admin.sessions.destroy');

    Route::get('/fanatic/joined', [JoinedController::class, 'index'])
         ->name('admin.joined.index');
    Route::get('/fanatic/joined/create', [JoinedController::class, 'create'])
         ->name('admin.joined.create');
    Route::post('/fanatic/joined', [JoinedController::class, 'store'])
         ->name('admin.joined.store');
    Route::get('/fanatic/joined/{joined}', [JoinedController::class, 'show'])
         ->name('admin.joined.show');
    Route::get('/fanatic/joined/{joined}/edit', [JoinedController::class, 'edit'])
         ->name('admin.joined.edit');
    Route::patch('/fanatic/joined/{joined}', [JoinedController::class, 'update'])
         ->name('admin.joined.update');
    Route::delete('/fanatic/joined/{joined}', [JoinedController::class, 'destroy'])
         ->name('admin.joined.destroy');
});
