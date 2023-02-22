<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::controller(ImageController::class)->group(function () {
    Route::get('/images', 'index');
    Route::get('/images/{id}', 'show');
    Route::post('/images/{id}', 'update');
    Route::post('/images', 'store');
});
Route::resource('category_products', CategoryProductController::class);