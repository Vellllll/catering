<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurMenuController;

Route::get('/', [DashboardController::class, 'main'])->name('dashboard.main');
Route::get('/our-menu', [OurMenuController::class, 'main'])->name('ourmenu.main');
