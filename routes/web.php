<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Auth;

// Маршрут для отображения всех категорий
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Маршрут для отображения содержимого конкретной категории по ID
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

// Маршрут для отображения всех блюд с указанием категории
Route::resource('/dishes', DishController::class);

Route::get('/search', [DishController::class, 'search'])->name('search');

// Маршрут для отображения всех ингредиентов для блюда
Route::get('/dishes/{id}/ingredients', [DishController::class, 'showIngredients'])->name('dishes.ingredients');

Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create')->middleware('auth');

Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit')->middleware('auth');

Route::post('/dishes/{dish}/update', [DishController::class, 'update'])->name('dishes.update')->middleware('auth');

Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy')->middleware('auth');



// Маршрут для отображения формы входа (страницы авторизации)
Route::get('/login', [LoginController::class, 'login'])->name('login');  
// Маршрут для выхода из системы
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Маршрут для обработки данных формы аутентификации
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});

Route::get('/', function () {
    return view('welcome');
});


