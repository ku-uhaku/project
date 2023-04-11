<?php

use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;

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
    return view('main');
})->name('main');
Route::get('/login', [LoginController::class, 'index'])->name('login-form');
Route::post('/log', [LoginController::class, 'login'])->name('log');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('users', UserController::class)->names('admin.users', 'admin.user');
    Route::resource('payment', PaymentController::class)->names('admin.payments', 'admin.payment');
    Route::resource('exam', ExamController::class)->names('admin.exams', 'admin.exam');
});
