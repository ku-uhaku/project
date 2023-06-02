<?php



use App\Http\Controllers\NewPayment;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Crud\BillController;
use App\Http\Controllers\Crud\ExamController;
use App\Http\Controllers\Crud\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Crud\PaymentController;
use App\Http\Controllers\Crud\VehicleController;
use App\Http\Controllers\Crud\SpendingController;

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

Route::view('/', 'main')->name('main');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('update-profile');

// Dashboard
Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/', 'dashboard.index')->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('spendings', SpendingController::class);
    Route::get('/payments/create/{user}', [NewPayment::class, 'create'])->name('payment.create');
    Route::post('/payments/store/{id}', [NewPayment::class, 'store'])->name('payment.store');
    Route::resource('exams', ExamController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::post('/exams/addStudent', [ExamController::class, 'addStudent'])->name('exams.addStudent');
    Route::post('/exams/updateResult', [ExamController::class, 'updateResult'])->name('exams.updateResult');
    Route::post('/exams/removeStudent', [ExamController::class, 'removeStudent'])->name('exams.removeStudent');
    Route::resource('bills', BillController::class);
});

Route::get('superadmin', [SuperAdminController::class, 'index'])->name('superadmin.index')->middleware(['auth', 'admin']);
Route::get('superadmin', [SuperAdminController::class, 'filter'])->name('superadmin.filter')->middleware(['auth', 'admin']);
Route::get('superadmin/profits', [SuperAdminController::class, 'profits'])->name('superadmin.profits')->middleware(['auth', 'admin']);
Route::get('superadmin/profits', [SuperAdminController::class, 'filterProfits'])->name('superadmin.filterProfits')->middleware(['auth', 'admin']);
Route::get('superadmin/profits/details', [SuperAdminController::class, 'profitsDetails'])->name('superadmin.profitsDetails')->middleware(['auth', 'admin']);
