<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckProductStock;
use App\Livewire\Product;
use App\Livewire\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::post('/search',[ProductController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/register',[RegisteredUserController::class, 'create'])->name('register');
Route::get('/login',[AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/',[ProductController::class, 'index'])->name('product.index');
Route::get('/contact-us',[ContactController::class, 'contact'])->name('product.contact');
Route::get('/product-details/{slug}/{id}',[ProductController::class, 'details'])->where('id','[0-9]+')->name('product.details');
Route::get('/shop/{category?}/{id?}',[ProductController::class, 'shop'])->where('id','[0-9]+')->name('product.shop');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
    Route::get('/order',[CommandeController::class, 'index'])->name('commande.index');
    
    
    Route::post('/commande',[CommandeController::class, 'processToCommande'])->name('commande.process');
    Route::post('/contact',[ContactController::class, 'contactUs'])->name('contact.contactUs');
    Route::post('/comment-product',[ProductController::class, 'comment'])->name('product.comment');
    Route::post('/add-to-cart',[CartController::class, 'addProductToCart'])->middleware([CheckProductStock::class])->name('cart.add')->withoutMiddleware(['csrf']);
    Route::post('/update-cart',[CartController::class, 'updateCart'])->middleware([CheckProductStock::class])->name('cart.update')->withoutMiddleware(['csrf']);
    Route::post('/remove-in-cart',[CartController::class, 'removeInCart'])->name('cart.remove')->withoutMiddleware(['csrf']);
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/_product', Product::class);
Route::get('/_cart', Cart::class);


require __DIR__.'/auth.php';