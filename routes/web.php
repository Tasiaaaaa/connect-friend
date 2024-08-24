<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FriendRequestController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/pay', [PaymentController::class, 'showPaymentPage'])->name('pay');
Route::post('/updatePaid', [AuthController::class, 'update_paid'])->name('updatePaid');
Route::get('/overPayment', [AuthController::class, 'handleOverpayment'])->name('handle.overpayment');
Route::post('/overPayment', [AuthController::class, 'processOverpayment'])->name('process.overpayment');

Route::middleware(['auth', 'paid'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::resource('user', UserController::class);
    Route::resource('friend-request', FriendRequestController::class);
    Route::resource('friend', FriendController::class);
    Route::resource('message', MessageController::class);
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

Route::get('/home', [SearchController::class, 'search'])->name('user.index');
Route::get('/switch-locale/{locale}', [LocalizationController::class, 'switchLocale'])->name('locale.switch');