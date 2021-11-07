<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'checkPayment'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->middleware('auth')->name('checkout.show');
Route::get('/checkout/payment', [App\Http\Controllers\CheckoutController::class, 'payment'])->middleware('auth')->name('checkout.payment');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->middleware('auth')->name('checkout.store');

