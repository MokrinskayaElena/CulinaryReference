<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductReviewController;

use Illuminate\Support\Facades\Auth;

// Обработка регистрации
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Маршрут для отображения формы входа (страницы авторизации)
Route::get('/login', [LoginController::class, 'login'])->name('login');  
// Маршрут для выхода из системы
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Маршрут для обработки данных формы аутентификации
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/profile', function () {
    return view('profile', ['user' => auth()->user()]);
})->name('profile')->middleware('auth');

// Маршрут для отображения главной (приветственной) страницы сайта
Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// Маршрут для отображения страницы с товарами
Route::get('/products', [ProductController::class, 'index'])->name('products');
// Маршрут для добавления/удаления лайка
Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle')->middleware('auth');
// Маршрут для отображения товаров в избранном
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
// Маршрут для отображения индивидуальной карточки товара
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Маршрут для поиска
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// Маршрут для отображения товаров в корзине
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
// Маршрут для добавления/удаления в корзину
Route::post('/basket/toggle/{product}', [BasketController::class, 'toggle'])->name('basket.toggle')->middleware('auth');

// Маршруты CRUD для оценок и отзывов
// Route::get('/products/{productId}/reviews', [ProductReviewController::class, 'index']);
Route::post('/reviews', [ProductReviewController::class, 'store'])->middleware('auth');
Route::put('/reviews/{id}', [ProductReviewController::class, 'update']);
Route::delete('/reviews/{id}', [ProductReviewController::class, 'destroy']);
Route::get('/product/{product}/reviews', [ProductReviewController::class, 'getReviews'])->name('product.reviews');



Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});

Route::get('/', function () {
    return view('welcome');
});



