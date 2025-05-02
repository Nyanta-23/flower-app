<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PlantCategoryController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', fn() => view('test'));

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

Route::get('/', function () {
    return view(view: 'index');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/profile', function () {
    //     return view('profile');
    // })->name('profile');

    // Route::get('/profile/edit', function () {
    //     return view('profile.edit');
    // })->name('profile.edit');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('plant')->group(function () {
        Route::get('/download', [PlantController::class, 'download'])->name('plant.download');
        Route::get('/download-single/{id}', [PlantController::class, 'downloadSingle'])->name('plant.download-single');
        Route::get('/', [PlantController::class, 'index'])->name('plant');
        Route::get('/create', [PlantController::class, 'create'])->name('plant.create');
        Route::post('/', [PlantController::class, 'store'])->name('plant.store');
        Route::get('/{id}', [PlantController::class, 'edit'])->name('plant.edit');
        Route::put('/{id}', [PlantController::class, 'update'])->name('plant.update');
        Route::delete('/{id}', [PlantController::class, 'destroy'])->name('plant.destroy');
    });


    Route::prefix('category')->group(function () {
        Route::get('/', [PlantCategoryController::class, 'index'])->name('category');
        Route::get('/create', [PlantCategoryController::class, 'create'])->name('category.create');
        Route::post('/', [PlantCategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}', [PlantCategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{id}', [PlantCategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [PlantCategoryController::class, 'destroy'])->name('category.destroy');
    });


    Route::prefix('scan-history')->group(function () {
        Route::get('/', [ScanController::class, 'index'])->name('scan-history');
        Route::get('/{id}', [ScanController::class, 'show'])->name('scan-history.show');
    });


    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

Route::get('/show-plant/{slug}', [GeneralController::class, 'getFlowerDetail'])->name('show-plant');
Route::get('/flower', [GeneralController::class, 'getFlowers'])->name('flower');

Route::get('/history', function () {
    return view('history');
});

Route::get('/favorite', function () {
    return view('favorit');
});

// Route::get('/detail', function () {
//     return view('detail');
// });
