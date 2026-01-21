@auth

<form id="review-form" style="display: none; max-width: 100%; border: 1px solid #ccc; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
<h3>Оставить отзыв</h3>    
@csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}" />

    <label>Оценка:</label>
    <div id="star-rating" style="font-size: 2em; cursor: pointer;">
        <span data-value="1">&#9733;</span>
        <span data-value="2">&#9733;</span>
        <span data-value="3">&#9733;</span>
        <span data-value="4">&#9733;</span>
        <span data-value="5">&#9733;</span>
    </div>
    <input type="hidden" name="rating" id="rating-input" value="0" required />

    <br/><br/>

    <label for="comment">Комментарий:</label>
    <textarea name="comment" rows="3" style="width: 100%;"></textarea>
    <br/><br/>
    <button type="submit" style="background-color: #a77734d4; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
        <i class="fa fa-paper-plane" style="margin-right: 8px;"></i> Отправить отзыв
    </button>
</form>
@endauth