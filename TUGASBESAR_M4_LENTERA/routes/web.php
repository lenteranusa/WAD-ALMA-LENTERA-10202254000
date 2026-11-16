<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MachineController;

// Public
// Public
// Public
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Must be logged in
Route::middleware('auth')->group(function () {

    Route::view('/', 'index')->name('home');

    // Admin and staff: view and update status
    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
        Route::put('/machines/{machine}', [MachineController::class, 'update'])->name('machines.update');
    });

    // Admin only: add and delete
    Route::middleware('role:admin')->group(function () {
        Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
        Route::delete('/machines/{machine}', [MachineController::class, 'destroy'])->name('machines.destroy');
    });
});