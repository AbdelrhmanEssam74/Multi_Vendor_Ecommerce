<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'roleManager:customer'])->name('dashboard');
// admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified' , 'roleManager:admin'])->name('admin.dashboard');
// seller dashboard
Route::get('/seller/dashboard', function () {
    return view('seller');
})->middleware(['auth', 'verified' , 'roleManager:seller'])->name('seller.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
