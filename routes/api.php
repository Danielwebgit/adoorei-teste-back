<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\AuthController;

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
Route::prefix('/v1')->group(function (){

    Route::prefix('/auth/user')->group(function (){

        Route::post('/login', [AuthController::class, 'login']);

        Route::group(['middleware' => ['apiJwt']], function () {

            Route::post('/logout', [AuthController::class, 'logout']);

        });

    });

    /** Routes to products groups */
    Route::prefix('/products')->group(function (){

        Route::get('/', [ProductsController::class, 'index']);
    });

    /** Routes to sales groups */
    Route::prefix('sales')->group(function (){

        // Adicionado uma proteção para ver essa rota, apenas quem tem permissão
        Route::group(['middleware' => ['apiJwt']], function () {

            Route::get('/', [SalesController::class, 'index']);

        });

        Route::get('/show/{saleId}', [SalesController::class, 'show']);
        Route::put('/cancel/{saleId}', [SalesController::class, 'cancelSale']);
        Route::post('/update/{saleId}', [SalesController::class, 'updateSale']);
        Route::post('/store', [SalesController::class, 'store']);

    });

});
/**
 * End - v1 / routes
 * */
