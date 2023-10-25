<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('commandes', [CustomOrderController::class, 'index'])->name('commande.index');
    Route::post('update-order', [CustomOrderController::class, 'changeState'])->withoutMiddleware(['csrf']);
    Route::get('search-order', [CustomOrderController::class, 'search'])->name('commande.search');
    Route::get('order-archives', [CustomOrderController::class, 'archives'])->name('commande.archives');
    Route::post('remove-order', [CustomOrderController::class, 'remove'])->name('commande.remove');
});
