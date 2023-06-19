<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Person Routes
    Route::controller(App\Http\Controllers\Admin\PersonController::class)->group(function() {
        Route::get('person', 'index');
        Route::get('person/create', 'create');
        Route::post('person', 'store');
        Route::get('person/{person}/edit', 'edit');
        Route::put('person/{person}', 'update');
        Route::get('person/{person}/show', 'show');
        Route::get('person/{person}/delete', 'destroy');
    });

    // Household Routes
    Route::controller(App\Http\Controllers\Admin\HouseholdController::class)->group(function() {
        Route::get('household', 'index');
        Route::get('household/create', 'create');
        Route::post('household', 'store');
        Route::get('household/{household}/edit', 'edit');
        Route::put('household/{household}', 'update');
        Route::get('household/{household}/show', 'show');
        Route::get('household/{household}/delete', 'destroy');   
    });

    // Temporary Routes
    Route::controller(App\Http\Controllers\Admin\TemporaryController::class)->group(function() {
        Route::get('temporary', 'index');
        Route::get('temporary/create', 'create');
        Route::post('temporary', 'store');
        Route::get('temporary/{temp}/edit', 'edit');
        Route::put('temporary/{temp}', 'update');
        Route::get('temporary/{temp}/show', 'show');
        Route::get('temporary/{temp}/delete', 'destroy');   
    });

    // Fee Routes
    Route::controller(App\Http\Controllers\Admin\FeeController::class)->group(function() {
        Route::get('fee', 'index');
        Route::get('fee/create', 'create');
        Route::post('fee', 'store');
        Route::get('fee/{fee}/edit', 'edit');
        Route::put('fee/{fee}', 'update');
        Route::get('fee/{fee}/show', 'show');
        Route::get('fee/{fee}/delete', 'destroy');   
    });

    // Receipt Routes
    Route::controller(App\Http\Controllers\Admin\ReceiptController::class)->group(function() {
        Route::get('receipt', 'index');
        Route::get('receipt/create', 'create');
        Route::post('receipt', 'store');
        Route::get('receipt/{receipt}/edit', 'edit');
        Route::put('receipt/{receipt}', 'update');
        Route::get('receipt/{receipt}/show', 'show');
        Route::get('receipt/{receipt}/delete', 'destroy');   
    });
});
