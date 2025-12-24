<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


// auth
Route::prefix('/')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

// admin panel
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    Route::get('menus', [MenuController::class, 'index'])->name('menus');
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::get('services', [ServiceController::class, 'index'])->name('services');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('social', [SocialController::class, 'index'])->name('social');


    Route::get('products/index', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::post('products/{product}/update', [AdminProductController::class, 'update'])->name('products.update');
});

// web
Route::middleware([])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact-us.index');
    Route::post('contact-us', [HomeController::class, 'contactUsStore'])->name('contact-us.store');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}/show', [ProductController::class, 'show'])->name('products.show');
});
