<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('main');

Route::get('/create', [DashboardController::class, 'create']);

Route::post('/create', [DashboardController::class, 'store']);

Route::get('/edit', [DashboardController::class, 'chooseButtonToEdit'])->name('edit');

Route::get('/edit/{id}', [DashboardController::class, 'edit']);

Route::post('/edit/{id}', [DashboardController::class, 'update']);

Route::get('/delete', [DashboardController::class, 'chooseButtonToDelete'])->name('delete');

Route::get('/delete/{id}', [DashboardController::class, 'destroy']);