<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class DishController extends Controller
{
    
    public function index(Request $request) {
        // Получаем значение perpage из запроса или по умолчанию (например, 2)
        $perPage = $request->get('perpage', 5);
        // Загружаем блюда с категориями с пагинацией
            $dishes = Dish::with('category')->paginate($perPage);
        // Передаем переменную perpage в представление, чтобы сохранить выбранное значение
        return view('dishes', compact('dishes', 'perPage'));
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
        $validated['user_id'] = auth()->id();

        Dish::create($validated);

        return redirect()->route('dishes.index');
    }

    // Форма для редактирования
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        // Проверяем разрешение на редактирование
        if (Gate::denies('update-dish', $dish)) {
            return redirect('/error')->with('message', 'У вас нет прав редактировать этот рецепт.');
        }
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
        // Проверяем разрешение на удаление
        if (Gate::denies('delete-dish', $dish)) {
            return redirect('/error')->with('message', 'У вас нет прав удалять этот рецепт.');
        }
        $dish->delete();
        return redirect()->route('dishes.index');
    } 

    public function search(Request $request)
{
    $query = $request->input('query');
    
    if (empty($query)) {
        // Если запрос пустой, можно просто вернуть ту же страницу или перенаправить назад
        return redirect()->back()->with('error', 'Пожалуйста, введите запрос для поиска.');
    }

    // Поиск с использованием ILIKE для PostgreSQL
    $dishes = Dish::where('name', 'ILIKE', '%' . $query . '%')->get();

    return view('search_results', compact('dishes', 'query'));
}
    
}
