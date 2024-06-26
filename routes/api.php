<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UploadFileController;

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
Route::resource('category', CategoryController::class);
Route::get('viewCategory', [CategoryController::class, 'index']);
Route::resource("uploadFile",UploadFileController::class);
// Route::g("student/{id}/edit",[CategoryController::class,'edit']);
