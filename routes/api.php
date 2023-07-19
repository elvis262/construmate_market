<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAvailable;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware([IsAvailable::class])->group(function () {
    Route::get('/categories',[CategoriesController::class,'getCategories']);
    Route::get('/trandy-products/{limit}',[ProductsController::class,'getTrandyProducts'])->where('limit', '[0-9]+');
    Route::get('/recent-products/{limit}',[ProductsController::class,'getRecentProducts'])->where('limit', '[0-9]+');
});