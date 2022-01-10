<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WishlistController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
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

Route::get('/', Home::class)->name('/');
Route::get('list-products/{pages}', 'App\Http\Controllers\ProductController@pages')->name('products.page');

Route::group(['middleware' => ['auth', 'web', 'verified']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('wishlists', WishlistController::class);
    Route::post('wishlists/clean', 'App\Http\Controllers\WishlistController@removeAll')->name('wishlists.removeAll');

    Route::resource('users', UsersController::class);
});
