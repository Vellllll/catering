<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurMenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OutletController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'main'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/our-menu/{menu_id}', [OurMenuController::class, 'main'])->middleware(['auth', 'verified'])->name('ourmenu.main');

Route::get('/order', [OrderController::class, 'main'])->middleware(['auth', 'verified'])->name('order.main');
Route::get('/_order_menus', [OrderController::class, 'orderMenus'])->middleware(['auth', 'verified'])->name('order.menus');
Route::get('/_order_menu_choices', [OrderController::class, 'orderMenuChoices'])->middleware(['auth', 'verified'])->name('order.menu.choices');
Route::get('/order_payment', [OrderController::class, 'orderPayment'])->middleware(['auth', 'verified'])->name('order.payment');
Route::post('/order', [OrderController::class, 'order'])->middleware(['auth', 'verified'])->name('order.order');

Route::get('/_get_outlet_location', [OutletController::class, 'getOutletLocation'])->middleware(['auth', 'verified'])->name('get.outlet.location');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

require __DIR__.'/auth.php';
