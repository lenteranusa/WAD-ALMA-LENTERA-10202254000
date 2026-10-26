<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;

Route::view('/', 'index')->name('home');

Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
Route::put('/machines/{machine}', [MachineController::class, 'update'])->name('machines.update');
Route::delete('/machines/{machine}', [MachineController::class, 'destroy'])->name('machines.destroy');