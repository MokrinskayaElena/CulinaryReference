<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;

// Маршрут для отображения всех категорий
Route::get('/categories', [CategoryController::class, 'index']);

// Маршрут для отображения содержимого конкретной категории по ID
Route::get('/category/{id}', [CategoryController::class, 'show']);

// Маршрут для отображения всех блюд с указанием категории
Route::resource('/dishes', DishController::class);
Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');

// Маршрут для отображения всех ингредиентов для блюда
Route::get('/dishes/{id}', [DishController::class, 'showIngredients'])->name('dishes.ingredients');


Route::get('/', function () {
    return view('welcome');
});

// Новый маршрут для отображения hello.blade.php
Route::get('/hello', function () {
    return view('hello', ['title' => 'Добро пожаловать!']);
});


