<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::post('/search', [BooksController::class, 'show']);
Route::post('/modify', [BooksController::class, 'edit']);
Route::post('/delete', [BooksController::class, 'destroy']);
Route::post('/insert', [BooksController::class, 'create']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return "hi";
});
