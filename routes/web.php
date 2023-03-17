<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Accueil
Route::get('/home', [ProductController::class, 'index'])->name('index');

// Dashboard admin
Route::get('/admin', [ProductController::class, 'admin_index'])
    // ->middleware(['auth', 'verified'])
    ->name('admin');

// Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes ressources
Route::resource("products", ProductController::class);


// Tests
Route::get('/test', function () {
    return view("test");
})->name("test");

require __DIR__ . '/auth.php';
