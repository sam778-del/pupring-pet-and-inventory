<?php

use Illuminate\Support\Facades\Route;


// Admin Controller
use App\Http\Controllers\Admin\{
    HomeController,
    CurrencyController
};


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

require __DIR__ . '/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(["auth"]);

    // Currency Area
    Route::resource('currencies', CurrencyController::class)->middleware('auth');
    Route::get('/get-currencies', [CurrencyController::class, "datatables"])
            ->middleware('auth')
            ->name('currencies.datatables');
    Route::patch('/currency-status/{currency_id}', [CurrencyController::class, 'changeCurrencyStatus'])
            ->middleware('auth')
            ->name('currencies.default');
});
