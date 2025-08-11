<?php

use App\Api\Controllers\AuthController;
use App\Api\Controllers\BookController;
use App\Api\Controllers\CategoryController;
use App\Api\Controllers\GenreController;
use App\Http\Controllers\BookCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'user']);
    Route::put('/change_password', [AuthController::class, 'change_password']);
});


Route::prefix('genre')->group( function (){
    Route::get('/index' , [GenreController::class , 'index']);
    Route::post('/create' , [GenreController::class , 'create']);
    Route::put('/update' , [GenreController::class , 'update']);
    Route::delete('/delete' , [GenreController::class , 'delete']);
});

Route::prefix('book')->group( function(){
    Route::get('/index' , [BookController::class , 'index']);
    Route::post('/create' , [BookController::class , 'create']);
    Route::put('/update/{id}' , [BookController::class , 'update']);
    Route::delete('/delete/{id}' , [BookController::class , 'delete']);
});


Route::prefix('category')->group( function (){
    Route::get('/index' , [CategoryController::class , 'index']);
});
