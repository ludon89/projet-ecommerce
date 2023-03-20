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

//  Route::get('/fireshop', function () {
    //  return view('index');
// });

// Accueil
Route::get('/', [ProductController::class, 'index'])->name('index');

// Dashboard admin
Route::get('/admin', [ProductController::class, 'admin_index'])
    // ->middleware(['auth', 'verified'])
    ->name('admin');

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

// Tests
Route::get('/test', function () {
    return view("test");
})->name("test");

Route::resource("/show", CartController::class);
Route::get('cart', "CartController@show")->name('cart.show');
Route::post('cart/add{product}', "CartController@add")->name('cart.add');
Route::get('cart/remove{product}', "CartController@remove")->name('cart.remove');
Route::get('cart/empty', "CartController@empty")->name('cart.empty');

require __DIR__ . '/auth.php';
