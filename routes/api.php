<?php

use App\Api\Controllers\AudioController;
use App\Api\Controllers\AuthController;
use App\Api\Controllers\BookController;
use App\Api\Controllers\CategoryController;
use App\Api\Controllers\GenreController;
use App\Api\Controllers\VideoLessonController;
use App\Http\Controllers\BookCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [AuthController::class, 'user']);
    Route::put('change-password', [AuthController::class, 'change_password']);
});


Route::prefix('genre')->group(function () {
    Route::get('index', [GenreController::class, 'index']);
    Route::post('create', [GenreController::class, 'create']);
    Route::put('update', [GenreController::class, 'update']);
    Route::delete('delete', [GenreController::class, 'delete']);
});

Route::prefix('book')->group(function () {
    Route::get('index', [BookController::class, 'index']);
    Route::post('create', [BookController::class, 'create']);
    Route::put('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
    Route::get('book-filter/{genre_id}' , [BookController::class , 'bookFilter']);
});

Route::prefix('videolesson')->group(function () {
    Route::get('index', [VideoLessonController::class, 'index']);
    Route::get('category-filter/{category_id}' , [VideoLessonController::class , 'filterByCategory']);
});

Route::prefix('category')->group(function () {
    Route::get('index', [CategoryController::class, 'index']);
});

Route::prefix('audio')->prefix(function(){
    Route::get('index' , [AudioController::class ,'index']);
});
