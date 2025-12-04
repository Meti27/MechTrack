<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\RepairOrderController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes (User Part)
|--------------------------------------------------------------------------
*/

// Home page for MechTrack
Route::get('/', [PublicController::class, 'home'])->name('home');

// Track repair (form + submit)
Route::get('/track-repair', [PublicController::class, 'showTrackForm'])->name('track.form');
Route::post('/track-repair', [PublicController::class, 'trackRepair'])->name('track.submit');


/*
|--------------------------------------------------------------------------
| Dashboard (Breeze default) -> redirect to our admin dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin Routes (CMS Part) - Protected by auth
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('customers', CustomerController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::resource('repairs', RepairOrderController::class);
    });


/*
|--------------------------------------------------------------------------
| Breeze Profile Routes (you can keep them, no conflict)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes (login, register, etc.)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
