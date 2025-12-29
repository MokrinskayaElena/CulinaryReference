<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function toggle($productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        $basketItem = Basket::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($basketItem) {
            // Удаляем из корзины
            $basketItem->delete();
            return response()->json(['in_basket' => false]);
        } else {
            // Добавляем в корзину
            Basket::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
            return response()->json(['in_basket' => true]);
        }
    }
public function index()
{
    $userId = auth()->id();
    // Получаем коллекцию корзины с связью на товар
    // $basketItems = \App\Models\Basket::where('user_id', $userId)->with('product')->paginate(8);
    $basketItems = \App\Models\Basket::where('user_id', $userId)
        ->with([
            'product' => function($query) {
                $query->withAvg('reviews', 'rating') // средний рейтинг
                      ->withCount('reviews'); // количество отзывов
            }
        ])
        ->paginate(8);
    // Передаем коллекцию в представление
    return view('basket', ['products' => $basketItems]);
}
}
