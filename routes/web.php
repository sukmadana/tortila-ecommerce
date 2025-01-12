<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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


Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard');

Route::view('profile', 'profile')
->middleware(['auth'])
->name('profile');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('product/{id}', [ProductController::class, 'show'])->name('product.single');
    Route::view('about', 'about')->name('about');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('add-cart', [CartController::class, 'add'])->name('cart.add');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('order', [CartController::class, 'order'])->name('order');
});
