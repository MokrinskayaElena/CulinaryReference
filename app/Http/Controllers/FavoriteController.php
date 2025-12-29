<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{   
    public function toggle($productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        $favorite = Favorite::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['favorited' => false]);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
            return response()->json(['favorited' => true]);
        }
    }
    public function index()
    {
        $userId = auth()->id();
        // Получаем список favorite с связью с товарами
         $favorites = Favorite::where('user_id', $userId)
        ->with([
            'product' => function($query) {
                $query->withAvg('reviews', 'rating') // средний рейтинг
                      ->withCount('reviews'); // количество отзывов
            }
        ])
        ->paginate(8);
        // Передаем список товаров в представление
        return view('favorite', ['products' => $favorites]);
    }
   
}
