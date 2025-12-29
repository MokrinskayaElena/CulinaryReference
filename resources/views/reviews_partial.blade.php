<div class="reviews">
    <!-- <h4>Отзывы</h4> -->
    @if($reviews->isEmpty())
        <p>Нет отзывов для этого товара.</p>
    @else
        @foreach($reviews as $review)
            <div class="review-card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 8px; background-color: #f9f9f9;">
                <div style="display: flex; align-items: center; margin-bottom: 8px;">
                    <!-- Иконка пользователя -->
                    <i class="fa fa-user-circle" style="font-size: 30px; margin-right: 10px; color: #555;"></i>
                    <!-- Имя пользователя -->
                    <strong>{{ \App\Models\User::find($review->user_id)->name ?? 'Пользователь' }}</strong>
                    <!-- Звезды рейтинга -->
                    <div style="margin-left: auto;">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $review->rating)
                                <i class="fa fa-star" style="color: orange;"></i>
                            @else
                                <i class="fa fa-star" style="color: #ccc;"></i>
                            @endif
                        @endfor
                        <!-- Дата публикации -->
                <div style="font-size: 0.85em; color: #999; margin-top: 8px;">
                    {{ $review->created_at->format('d.m.Y') }} в {{ $review->created_at->format('H:i') }}
                </div>
                    </div>
                </div>
                
                <!-- Текст комментария -->
                <div style="font-size: 1em; line-height: 1.4; margin-left: 20px;">
                    {{ $review->comment }}
                </div>
            </div>
        @endforeach
    @endif
</div>