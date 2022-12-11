<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\EntryProductController;

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

Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'getList']);
    Route::get('/{id}', [UserController::class, 'get']);
    Route::post('/create', [UserController::class, 'store']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

Route::prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'getList']);
    Route::get('/{id}', [ProductController::class, 'get']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'delete']);

    Route::get('/entryProduct', [EntryProductController::class, 'getList']);
});

Route::prefix('entry')->group(function() {
    Route::get('/product', [EntryProductController::class, 'getList']);
    Route::get('/product/{id}', [EntryProductController::class, 'get']);
    Route::post('/product/create', [EntryProductController::class, 'store']);
    Route::post('/product/update/{id}', [EntryProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [EntryProductController::class, 'delete']);
});
