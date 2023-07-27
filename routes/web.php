<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

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

Route::get('/cart', function () {
    return view('cart.show');
});

// Accueil
Route::get('/', [ProductController::class, 'index'])->name('index');

// Dashboard admin
Route::get('/admin', [ProductController::class, 'admin_index'])
    // ->middleware(['auth', 'verified'])
    ->name('admin');

// Catalague (tous les produits)
Route::get('/catalogue', [ProductController::class, 'catalogue_index'])
    ->name("catalogue");


///////////////////

// Dashboard utilisateur
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


///////////////////

// Routes ressources
Route::resource("products", ProductController::class);


///////////////////

//Route::resource("/show", CartController::class);
//Route::get('cart', "CartController@show")->name('cart.show');
Route::post('cart/add{product}', "CartController@add")->name('cart.add');
Route::get('cart/remove{product}', "CartController@remove")->name('cart.remove');
Route::get('cart/empty', "CartController@empty")->name('cart.empty');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
require __DIR__ . '/auth.php';




/////////////////// TESTS ///////////////////

Route::get("/test", function () {
    return view("test");
});
