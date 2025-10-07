<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;

class DishController extends Controller
{
    
    public function index() {
    // Загружаем блюда вместе с их категориями, чтобы избежать N+1 запросов
    $dishes = Dish::with('category')->get();
    return view('dishes', compact('dishes'));
    }

    public function showIngredients($id) {
        $dish = Dish::with('ingredients')->findOrFail($id);
       return view('dish_ingredient', compact('dish'));
    }

    // Форма для создания блюда
    public function create()
    {
        $categories = Category::all();
        return view('dishes_create', compact('categories'));
    }

    // Обработка сохранения нового блюда
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:category,id',
            'name' => 'required|string|max:255',
            'preparation_method' => 'required|string|max:500',
            'preparation_time' => 'required|integer|min:1',
        ]);

        Dish::create($validated);

        return redirect()->route('dishes.index');
    }

    // Форма для редактирования
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::all();
        return view('dishes_edit', compact('dish', 'categories'));
    }

    // Обновление записи
    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);
        $validated = $request->validate([
            'category_id' => 'required|exists:category,id',
            'name' => 'required|string|max:255',
            'preparation_method' => 'required|string|max:500',
            'preparation_time' => 'required|integer|min:1',
        ]);

        $dish->update($validated);
        return redirect()->route('dishes.index');
    }

    // Удаление записи
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();
        return redirect()->route('dishes.index');
    } 
    
}
