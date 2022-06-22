<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    StoreController,
    ItemController,
    RoleController,
    TrolleyController,
};

Route::get('/', [DashboardController::class, 'index'])->name('welcome');

Route::middleware(['auth'])->group(function() {
    Route::get('/detail/{item}', [DashboardController::class, 'show'])->name('detail');
    Route::get('/add-to-cart/{item}', [DashboardController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update-information', [UserController::class, 'updateInformation'])->name('profile.update-information');
    Route::put('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.update-password');
    
    Route::resource('trolleys', TrolleyController::class);

    Route::resource('stores', StoreController::class)->middleware('can:edit_store');
    Route::resource('users', UserController::class)->middleware('can:edit_user');
    Route::resource('items', ItemController::class)->middleware('can:create_item');

    Route::middleware(['can:do_anything'])->group(function() {
        Route::resource('roles', RoleController::class);
    });
});

require __DIR__.'/auth.php';
