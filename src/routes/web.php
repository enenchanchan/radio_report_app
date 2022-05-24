<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::resource('/articles', ArticleController::class)->except('index', 'show')->middleware('auth');

Route::resource('/articles', ArticleController::class)->only('show');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::get('/{name}/favorites', [UserController::class, 'favorite'])->name('favorites');
});
