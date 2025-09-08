<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('form', [OrderController::class, 'form'])->name('form.ticket');
Route::post('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/tickets/payment', [OrderController::class, 'payment']);
Route::post('/tickets/callback', [OrderController::class, 'callback'])->name('tickets.callback');
Route::get('/tickets/success/{orderId}', [OrderController::class, 'success'])->name('tickets.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kontak', KontakController::class);
    Route::resource('galeri', GaleriController::class);
});

require __DIR__ . '/auth.php';
