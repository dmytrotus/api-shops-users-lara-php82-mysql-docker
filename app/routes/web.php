<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevelopmentController;

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

Route::get('/', [DevelopmentController::class, 'index']);
Route::post('/migrate-and-seed', [DevelopmentController::class, 'runMigrationsAndSeeder'])->name('run-migration-and-seed');
