<?php

use App\Http\Controllers\ApiRequestLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-news', [ApiRequestLogController::class, 'getNews'])
    ->name('get-news');
