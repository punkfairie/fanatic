<?php

use App\Http\Controllers\CollectiveController;
use App\Http\Controllers\JoinedController;
use App\Http\Controllers\OwnedController;
use App\Http\Controllers\SessionsController;
use App\Models\Owned;
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
    Route::get('/fanatic/login', [SessionsController::class, 'create'])->name('admin.sessions.create');
    Route::get('/fanatic/install', [CollectiveController::class, 'create'])->name('admin.collectives.create');
    Route::post('/fanatic', [CollectiveController::class, 'store'])->name('admin.collectives.store');
});

Route::post('/fanatic', [SessionsController::class, 'store'])->name('admin.sessions.store');

Route::middleware('auth')->group(function () {
    Route::get('/fanatic', [CollectiveController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/fanatic', [SessionsController::class, 'destroy'])->name('admin.sessions.destroy');

    // joined
    Route::get('/fanatic/joined', [JoinedController::class, 'index'])->name('admin.joined.index');
    Route::get('/fanatic/joined/create', [JoinedController::class, 'create'])->name('admin.joined.create');
    Route::post('/fanatic/joined', [JoinedController::class, 'store'])->name('admin.joined.store');
    Route::get('/fanatic/joined/{joined}/edit', [JoinedController::class, 'edit'])->name('admin.joined.edit');
    Route::patch('/fanatic/joined/{joined}', [JoinedController::class, 'update'])->name('admin.joined.update');
    Route::delete('/fanatic/joined/{joined}', [JoinedController::class, 'destroy'])->name('admin.joined.destroy');

    // owned
    Route::get('/fanatic/owned', [OwnedController::class, 'index'])->name('admin.owned.index');
    Route::get('/fanatic/owned/create', [OwnedController::class, 'create'])->name('admin.owned.create');
    Route::post('/fanatic/owned', [OwnedController::class, 'store'])->name('admin.owned.store');
    Route::get('/fanatic/owned/{owned}/edit', [OwnedController::class, 'edit'])->name('admin.owned.edit');
    Route::patch('/fanatic/owned/{owned}', [OwnedController::class, 'update'])->name('admin.owned.update');
    Route::delete('/fanatic/owned/{owned}', [OwnedController::class, 'destroy'])->name('admin.owned.destroy');
});
