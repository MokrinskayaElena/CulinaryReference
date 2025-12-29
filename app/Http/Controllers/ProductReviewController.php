<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class ProductReviewController extends Controller
{
    public function showReviews($productId)
    {
        // Получаем все отзывы для товара с id = $productId
        $reviews = \App\Models\ProductReview::where('product_id', $productId)->get();

        // Передаем отзывы в представление
        return view('reviews', compact('reviews'));
    }
    // Получение всех отзывов для товара
    public function getReviews(Product $product)
    {
        $reviews = Review::where('product_id', $product->id)->with('user')->get();
        return view('reviews_partial', compact('reviews'));
    }

    // Создание нового отзыва
    public function store(Request $request)
    {
        // Валидация
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Создаем отзыв
        $review = new ProductReview();
        $review->product_id = $request->input('product_id');
        $review->user_id = Auth::id();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return response()->json(['message' => 'Отзыв сохранен'], 201);
    }
    // Обновление отзыва
    public function update(Request $request, $id)
    {
        $review = ProductReview::findOrFail($id);
        $validated = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        $review->update($validated);
        return response()->json($review);
    }

    // Удаление отзыва
    public function destroy($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
