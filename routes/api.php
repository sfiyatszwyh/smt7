<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StockLogController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::apiResource('products', ProductController::class);

Route::get('/product', [ProductController::class,'index']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::post('/product', [ProductController::class,'store']);
Route::put('/product/{id}', [ProductController::class,'update']);
Route::delete('/product/{id}', [ProductController::class,'destroy']);

Route::get('/transaction', [TransactionController::class,'index']);
Route::get('/transaction/{id}', [TransactionController::class,'show']);
Route::post('/transaction', [TransactionController::class,'store']);
Route::patch('/transaction/{id}', [TransactionController::class,'update']);
Route::delete('/transaction/{id}', [TransactionController::class,'destroy']);

Route::get('/transaction_detail', [TransactionDetailController::class,'index']);
Route::get('/transaction_detail/{id}', [TransactionDetailController::class,'show']);
Route::post('/transaction_detail', [TransactionDetailController::class,'store']);
Route::patch('/transaction_detail/{id}', [TransactionDetailController::class,'update']);
Route::delete('/transaction_detail/{id}', [TransactionDetailController::class,'destroy']);

Route::get('/customer', [CustomerController::class,'index']);
Route::get('/customer/{id}', [CustomerController::class,'show']);
Route::post('/customer', [CustomerController::class,'store']);
Route::put('/customer/{id}', [CustomerController::class,'update']);
Route::delete('/customer/{id}', [CustomerController::class,'destroy']);

Route::get('/stock', [StockLogController::class,'index']);
Route::get('/stock/{id}', [StockLogController::class,'show']);
Route::post('/stock', [StockLogController::class,'store']);
Route::patch('/stock/{id}', [StockLogController::class,'update']);
Route::delete('/stock/{id}', [StockLogController::class,'destroy']);

Route::get('/cat', [CategoryController::class,'index']);
Route::get('/cat/{id}', [CategoryController::class,'show']);
Route::post('/cat', [CategoryController::class,'store']);
Route::patch('/cat/{id}', [CategoryController::class,'update']);
Route::delete('/cat/{id}', [CategoryController::class,'destroy']);