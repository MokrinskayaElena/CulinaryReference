<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Получаем товары по 8 штук на страницу
        // $products = \App\Models\Product::paginate(8)->onEachSide(1);
        $products = \App\Models\Product::withAvg('reviews', 'rating') // средний рейтинг
        ->withCount('reviews') // количество отзывов
        ->paginate(8)->onEachSide(1);
        return view('products', compact('products'));
    }

    public function show($id)
    {
        // Получаем товар по ID
        $product = Product::findOrFail($id);
        
        // Получаем отзывы для этого товара
        $reviews = \App\Models\ProductReview::where('product_id', $product->id)->get();
        
        // Подсчет среднего рейтинга
        $averageRating = \App\Models\ProductReview::where('product_id', $product->id)->avg('rating');
        // Подсчет количества отзывов
        $reviewsCount = \App\Models\ProductReview::where('product_id', $product->id)->count();

        // Передаем товар, отзывы, рейтинг и количество отзывов в представление
        return view('item', compact('product', 'reviews', 'averageRating', 'reviewsCount'));
        
    }

public function search(Request $request)
{
    $query = trim($request->input('query'));

    // Получим информацию о колонках таблицы
    $columns = [
        'id' => 'bigint',
        'name' => 'varchar',
        'description' => 'text',
        'price' => 'numeric',
        'image_url' => 'varchar',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    // Создадим правила валидации для поиска
    $rules = [];

    // Предположим, что пользователь может искать по любому полю, и мы хотим это 
    if (is_numeric($query)) {
        // Для id — проверить, что это число или UUID, в зависимости от типа
        $rules['query'] = 'digits_between:1,20'; 
    } elseif ($this->isValidUuid($query)) {
        $rules['query'] = 'string|size:36'; // для UUID
    } else {
        // Для текста — ограничить длину
        $rules['query'] = 'string|max:255';
    }

    // Выполняем валидацию
    $validatedData = $request->validate($rules);

    if (ctype_digit($query) || $this->isValidUuid($query)) {
        // Поиск по id
         $products = \App\Models\Product::where('id', $query)
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->paginate(8);
    } else {
        // Поиск по названию
        $escapedQuery = str_replace(['%', '_'], ['\%', '\_'], $query);
        $products = \App\Models\Product::where('name', 'ILIKE', '%' . $escapedQuery . '%')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->paginate(8);
    }

    return view('search', [
        'products' => $products,
        'query' => $query,
    ]);
}
private function isValidUuid($uuid)
{
    return preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/', $uuid);
}
}
