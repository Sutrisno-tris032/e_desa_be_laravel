<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/news', [App\Http\Controllers\NewsController::class, 'getNewsList']);
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'getNewsDetail']);
Route::get('/news/{id}/commentar', [App\Http\Controllers\NewsController::class, 'getCommentar']);
Route::get('/recent_posts', [App\Http\Controllers\NewsController::class, 'getRecentPost']);
Route::post('/comment', [App\Http\Controllers\CommenttaryController::class, 'postCommentary']);
