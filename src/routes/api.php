<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RadioController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Arg;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('radios', function () {
    return \App\Models\Radio::all();
});

Route::get('articles/create', [ArticleController::class, 'search_radio'])
    ->name('search.radio');
