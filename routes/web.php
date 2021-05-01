<?php

// namespace App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('Auth')->group(function () {
    Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
    Route::post('/login', [LoginController::class, 'process_login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('order', OrderController::class)->except(['show']);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
