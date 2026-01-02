<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoriesController;
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
use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserAuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


// auth
Route::prefix('/')->group(function () {
    Route::get('login', [UserAuthController::class, 'login'])->name('user.login')->middleware('guest');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

// admin panel
Route::middleware(['auth',CheckAdmin::class])->prefix('admin')->name('admin.')->group(function () {
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

    Route::get('products/{product}/gallery', [AdminProductController::class, 'galleryIndex'])->name('products.galleryIndex');
    Route::post('products/{product}/gallery', [AdminProductController::class, 'galleryStore'])->name('products.galleryStore');


    // category
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
});

// web
Route::middleware([])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact-us.index');
    Route::post('contact-us', [HomeController::class, 'contactUsStore'])->name('contact-us.store');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}/show', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{search}', [ProductController::class, 'search'])->name('products.search');

    // user panel
    Route::middleware([CheckUser::class])->prefix('user')->group(function () {
        Route::get('/', [PanelController::class, 'index'])->name('user.panel.index');
        Route::get('basket', [PanelController::class, 'basket'])->name('user.basket.index');
        Route::post('basket/{product}', [PanelController::class, 'basketStore'])->name('user.basket.store');
        Route::get('basket/{basket}', [PanelController::class, 'basketDelete'])->name('user.basket.delete');
        Route::get('orders', [PanelController::class, 'orders'])->name('user.orders.index');
    });

    // auth
    Route::prefix('user')->group(function () {
        Route::get('/login', [UserAuthController::class, 'login'])->name('user.login')->middleware('guest');
        Route::post('/login', [UserAuthController::class, 'doLogin'])->name('user.login')->middleware('guest');
        Route::get('/register', [UserAuthController::class, 'register'])->name('user.register')->middleware('guest');
        Route::post('/register', [UserAuthController::class, 'store'])->name('user.register')->middleware('guest');
        Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout')->middleware('auth');
    });
});
