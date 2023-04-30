<?php

use App\Http\Controllers\MdwApp\AppController;
use App\Http\Controllers\MdwApp\AuthController as AuthAppController;
use App\Http\Controllers\MdwAdm\AuthController as AuthAdmController;
use App\Http\Controllers\MdwAdm\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/** App Group */
Route::group(['prefix' => 'app', 'as' => 'app.'], function () {
    Route::get('login', [AuthAppController::class, 'login'])->name('login');
    Route::post('auth', [AuthAppController::class, 'auth'])->name('auth');

    Route::group(['middleware' => ['mdwapp']], function () {
        Route::get('dashboard', [AppController::class, 'dashboard'])->name('dashboard');
    });
    Route::get('logout', [AppController::class, 'logout'])->name('logout');
});

/** Admin Grouyp */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthAdmController::class, 'login'])->name('login');
    Route::post('auth', [AuthAdmController::class, 'auth'])->name('auth');

    Route::group(['middleware' => ['mdwadm']], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
});
