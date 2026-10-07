<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('books')->group(function () {

    Route::get('/', [BookController::class, 'index']);

    Route::get('/{id}', [BookController::class, 'show']);

    Route::post('/' , [BookController::class,'store']);

    Route::put('/{id}' , [BookController::class,'update']);

    Route::delete('/{id}' , [BookController::class,'destroy']);
});

Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::get('/{id}', [ProductController::class, 'show']);

    Route::post('/' , [ProductController::class,'store']);

    Route::put('/{id}' , [ProductController::class,'update']);

    Route::delete('/{id}' , [ProductController::class,'destroy']);

    Route::post('/{id}/reduce_stock' , [ProductController::class,'reduce_stock']);
});
