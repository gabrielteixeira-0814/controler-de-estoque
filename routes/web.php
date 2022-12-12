<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\EntryProductController;
use App\Http\Controllers\Product\ItemEntryProductController;
use App\Http\Controllers\Product\OutputProductController;
use App\Http\Controllers\Product\ItemOutputProductController;
use App\Http\Controllers\Product\ProductRequisitionController;
use App\Http\Controllers\Inventory\InventoryController;

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

// User
Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'getList']);
    Route::get('/{id}', [UserController::class, 'get']);
    Route::post('/create', [UserController::class, 'store']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

// Product
Route::prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'getList']);
    Route::get('/{id}', [ProductController::class, 'get']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'delete']);
});

// Entry Product
Route::prefix('entry')->group(function() {
    Route::get('/product', [EntryProductController::class, 'getList']);
    Route::get('/product/{id}', [EntryProductController::class, 'get']);
    Route::post('/product/create', [EntryProductController::class, 'store']);
    Route::post('/product/update/{id}', [EntryProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [EntryProductController::class, 'delete']);
});

// Item Entry Product
Route::prefix('item')->group(function() {
    Route::get('entry/product', [ItemEntryProductController::class, 'getList']);
    Route::get('entry/product/{id}', [ItemEntryProductController::class, 'get']);
    Route::post('entry/product/create', [ItemEntryProductController::class, 'store']);
    Route::post('entry/product/update/{id}', [ItemEntryProductController::class, 'update']);
    Route::delete('entry/product/delete/{id}', [ItemEntryProductController::class, 'delete']);
});

// OutPut Product
Route::prefix('output')->group(function() {
    Route::get('/product', [OutputProductController::class, 'getList']);
    Route::get('/product/{id}', [OutputProductController::class, 'get']);
    Route::post('/product/create', [OutputProductController::class, 'store']);
    Route::post('/product/update/{id}', [OutputProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [OutputProductController::class, 'delete']);
});

// Item Output Product
Route::prefix('item')->group(function() {
    Route::get('output/product', [ItemOutputProductController::class, 'getList']);
    Route::get('output/product/{id}', [ItemOutputProductController::class, 'get']);
    Route::post('output/product/create', [ItemOutputProductController::class, 'store']);
    Route::post('output/product/update/{id}', [ItemOutputProductController::class, 'update']);
    Route::delete('output/product/delete/{id}', [ItemOutputProductController::class, 'delete']);
});

// Requisition Product
Route::prefix('requisition')->group(function() {
    Route::get('/product', [ProductRequisitionController::class, 'getList']);
    Route::get('/product/{id}', [ProductRequisitionController::class, 'get']);
    Route::post('/product/create', [ProductRequisitionController::class, 'store']);
    Route::post('/product/update/{id}', [ProductRequisitionController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductRequisitionController::class, 'delete']);
});

Route::prefix('inventory')->group(function() {
    Route::get('/', [InventoryController::class, 'getList']);
    Route::get('/{id}', [InventoryController::class, 'get']);
    Route::post('/create', [InventoryController::class, 'store']);
    Route::post('/update/{id}', [InventoryController::class, 'update']);
    Route::delete('/delete/{id}', [InventoryController::class, 'delete']);
});
