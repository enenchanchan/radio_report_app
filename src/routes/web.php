<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;

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

Auth::routes();


Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::resource('/articles', ArticleController::class)->except('index', 'show')->middleware('auth');

Route::resource('/articles', ArticleController::class)->only('show');


Route::resource('/radios', RadioController::class)->except('edit');

Route::resource('/radios', RadioController::class)->only('edit')->middleware('auth');

Route::prefix('radios')->name('radios.')->group(function () {
    Route::put('/{radio}/favorite', [RadioController::class, 'favorite'])->name('favorite');
    Route::delete('/{radio}/favorite', [RadioController::class, 'unfavorite'])->name('unfavorite');
});


Route::resource('/users', UserController::class);

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{user}/favorites', [UserController::class, 'favorites'])->name('favorites');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', [RegisterController::class, 'showProviderUserRegistrationForm'])->name('{provider}');
    Route::post('/{provider}', [RegisterController::class, 'registerProviderUser'])->name('{provider}');
});

Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('{provider}');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('{provider}.callback');
});
