<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionsController;
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


Route::fallback(function () {
    return "Jangan asal buka";
});


Route::get('/', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/', LandingController::class)->name('landing');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/', [LandingController::class, '__invoke']);
Route::get('/contact-us', [ContactController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'store']);

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/index', [TransactionController::class, 'show'])->name('transactions.show');
Route::resource('transactions', TransactionController::class);

Route::get('/transactions/{list}', [TransactionController::class, 'show'])->name('transactions.show');
Route::patch('/transactions/{list}}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{list})', [TransactionController::class, 'destroy'])->name('transactions.destroy');
