<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

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

Route::get('/shop/all', [ShopController::class, 'index']);
Route::get('/shop/show/{id}', [ShopController::class, 'show']);
Route::post('/shop/store', [ShopController::class, 'store']);
Route::put('/shop/update/{id}', [ShopController::class, 'update']);
Route::delete('/shop/delete/{id}', [ShopController::class, 'destroy']);

Route::get('/product', [ProductController::class, 'index']);
