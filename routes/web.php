<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'permission:admin.dashboard'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::group(['prefix' => 'book'], function () {
        Route::controller(BookController::class)->group( function () {
            Route::group(['middleware' => 'permission:book.create|book.edit|book.delete'], function () {
                Route::get('/create', 'create')->name('book.create');
                Route::post('/create', 'store')->name('book.store');
                Route::get('/{book}/edit', 'edit')->name('book.edit');
                Route::put('/{book}', 'update')->name('book.update');
                Route::delete('/{book}', 'destroy')->name('book.destroy');
            });
            Route::group(['middleware' => 'permission:book.read'], function () {
                Route::get('', 'index')->name('book.index');
                Route::get('/{book}', 'show')->name('book.show');
            });
        });
    });

    Route::group(['prefix' => 'user'], function () {
        Route::group(['middleware' => 'permission:user.read'], function () {
            Route::controller(UserController::class)->group( function () {
                Route::get('', 'index')->name('user.index');
                Route::get('/create', 'create')->name('user.create');
                Route::get('/{user}', 'show')->name('user.show');
                Route::post('/create', 'store')->name('user.store');
                Route::get('/{user}/edit','edit')->name('user.edit');
                Route::put('/{user}', 'update')->name('user.update');
                Route::delete('/{user}', 'destroy')->name('user.destroy');
            });
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
