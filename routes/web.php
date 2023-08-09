<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthAdminController;
use App\Http\Controllers\User\AdminController;
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

Route::get('/', [AuthAdminController::class, 'showAdminLogin'])->name('admin.showLogin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
