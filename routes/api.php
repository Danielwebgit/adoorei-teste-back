<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\SalesController;

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

/**
 * Start - v1 / routes
 * */
Route::prefix('v1')->group(function (){

    /** Routes to products groups */
    Route::prefix('/products')->group(function (){

        Route::get('/', [ProductsController::class, 'index']);
    });

    /** Routes to sales groups */
    Route::prefix('sales')->group(function (){

        Route::get('/', [SalesController::class, 'index']);
    });

});
/**
 * End - v1 / routes
 * */
