<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('home');
});

// Route Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route About Us
Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us');

// Route Contact Us
Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact_us');

// Route Product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
// Route Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
Route::post('/categories/store',[CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
