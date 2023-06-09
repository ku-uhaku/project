<?php



use App\Http\Controllers\NewPayment;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ErrorsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Crud\BillController;
use App\Http\Controllers\Crud\ExamController;
use App\Http\Controllers\Crud\UserController;
use App\Http\Controllers\PDFPaymentController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ContactMailController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Crud\PaymentController;
use App\Http\Controllers\Crud\SessionController;
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
Route::prefix('dashboard')->middleware(['auth', 'SuperAdminAndAdmin'])->group(function () {
    Route::view('/', 'dashboard.index')->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('spendings', SpendingController::class);
    Route::get('/payments/create/{user}', [NewPayment::class, 'create'])->name('payment.create');
    Route::post('/payments/store/{id}', [NewPayment::class, 'store'])->name('payment.store');
    Route::get('generate-pdf/{user}', [PDFPaymentController::class, 'generatePaymentPDF'])->name('payment.pdf');
    Route::resource('exams', ExamController::class);

    Route::resource('sessions', SessionController::class);
    Route::post('/sessions/add-student', [SessionController::class, 'addStudent'])->name('sessions.addStudent');
    Route::post('/sessions/update-isattended', [SessionController::class, 'updateIsAttended'])->name('sessions.updateIsAttended');
    Route::post('/sessions/remove-student', [SessionController::class, 'removeStudent'])->name('sessions.removeStudent');
    Route::resource('vehicles', VehicleController::class);
    Route::post('/exams/addStudent', [ExamController::class, 'addStudent'])->name('exams.addStudent');
    Route::post('/exams/updateResult', [ExamController::class, 'updateResult'])->name('exams.updateResult');
    Route::post('/exams/removeStudent', [ExamController::class, 'removeStudent'])->name('exams.removeStudent');
    Route::resource('bills', BillController::class);
});

Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('superadmin');
    Route::get('/', [SuperAdminController::class, 'filter'])->name('superadmin.filter');
    Route::get('/profits', [SuperAdminController::class, 'profits'])->name('superadmin.profits');
    Route::get('/profits', [SuperAdminController::class, 'filterProfits'])->name('superadmin.filterProfits');
    Route::get('/profits/details', [SuperAdminController::class, 'profitsDetails'])->name('superadmin.profitsDetails');
});


Route::post('/contact', [ContactMailController::class, 'index'])->name('contact');


Route::fallback([ErrorsController::class, 'error404']);
