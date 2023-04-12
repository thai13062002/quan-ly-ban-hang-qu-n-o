<?php

use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LikeProductController;
use App\Http\Controllers\User\NewsletterController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;

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



Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
    Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'formRegister'])->name('formRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgotpassword', [PasswordController::class, 'formForgotpassword'])->name('formForgotpassword');
    Route::post('/forgotpassword', [PasswordController::class, 'forgotpassword'])->name('forgotpassword');
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact-send', [HomeController::class, 'sendContact'])->name('contact.send');
    Route::get('/categories/{category:slug}', [HomeController::class, 'category'])->name('categories.index');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop.index');
    Route::get('/products', [HomeController::class, 'productList'])->name('products.index');
    Route::get('/product-detail/{product:slug}', [HomeController::class, 'detail'])->name('product.detail');
    Route::get('/products/search', [HomeController::class, 'searchProducts'])->name('searchProducts');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/colorsize', [ProductController::class, 'getColorSize'])->name('colorsize');
    Route::post('/register-newsletter', [NewsletterController::class, 'registerNewsletter'])->name('register.newsletter');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/change-password', [PasswordController::class, 'formChangePassword'])->name('formChangePassword');
        Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('changePassword');
        Route::get('/dashboard', [AuthController::class, 'detail'])->name('detail');
        Route::get('/province', [AddressController::class, 'province'])->name('province');
        Route::get('/district/{province_id}', [AddressController::class,'district'])->name('district');
        Route::get('/ward/{district_id}', [AddressController::class,'ward'])->name('ward');
        Route::get('/edit-user', [AuthController::class, 'edit'])->name('edit.info');
        Route::post('/update-user', [AuthController::class, 'update'])->name('update.info');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');
        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
            Route::get('/', [CartController::class, 'index'])->name('product');
            Route::post('/product-detail/{product:slug}', [CartController::class, 'store'])->name('create');
            Route::delete('{id}/destroy', [CartController::class, 'destroy'])->name('destroyProduct');
        });
        Route::group(['prefix' => 'like-products', 'as' => 'like.'], function () {
            Route::get('/', [LikeProductController::class, 'index'])->name('listProducts');
            Route::post('/product-detail/{product:slug}', [LikeProductController::class, 'store'])->name('create');
            Route::delete('{id}/destroy', [LikeProductController::class, 'destroy'])->name('destroyProduct');
        });
        Route::get('/payment', [PaymentController::class, 'payWithStripe'])->name('payment');
    });
});
