<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $product->name }}</title>
    <link href="fonts/gotham pro/stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/item.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    
    <!-- <link rel="stylesheet" href="{{ asset('css/products.css') }}" /> -->
    
</head>
<body>
    @include('beanie')
    <section class="section1">
      <div class="above">
        <h2 class="section1_h2"> {{ $product->name }}</h2>
        <!-- <p class="section1_p"> \   Balancy</p> -->
       <img src="{{ asset('img/Title_beanie.png') }}" alt="Title_beanie" class="section1_Title_beanie" />
      </div>
    </section>

    <div class="slide">
        <button onclick="window.history.back()" class="btn-back">
            <i class="fa fa-arrow-left">Назад</i>
        </button>
        <!-- Карточка товара -->
            <div class="between">
                <div class="Card"> 
                    <img class="Product" src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" />
                </div>
                <div class="section2"> 
                    <h3>{{ $product->name }}</h3>
                    <div style="display: flex; align-items: center; margin-top: 8px;">
                        <i class="fa fa-star" style="color: gold; margin-right: 8px; font-size: 1.2em; vertical-align: middle;"></i>
                        <span style="font-size: 1.2em; line-height: 1;">{{ number_format($averageRating, 1) }}</span>
                        <span style="margin-left: 40px; font-size: 0.7em; color: #777; line-height: 1;">Оценок: {{ $reviewsCount }}</span>
                    </div>
                    <p>Артикул: {{ $product->id }}</p>
                    <p>Описание </p>
                    <p>{{ $product->description }}</p>
                </div>
                
                    <div class="section2 section3 ">
                        <div class="section3_1">
                            
                            <div class="between">
                                <p class="price">{{ $product->price }} ₽</p>
                                <!-- Блок с формой для избранного -->
                                <form class="favorite-form" data-product-id="{{ $product->id }}" method="POST" action="{{ route('favorites.toggle', $product->id) }}">
                                    @csrf
                                    <button type="submit" style="border:none; background:none; padding:0; cursor:pointer;">
                                        @php
                                            $isFavorited = \App\Models\Favorite::where('user_id', auth()->id())->where('product_id', $product->id)->exists();
                                        @endphp
                                        <i class="heart {{ $isFavorited ? 'fa fa-heart' : 'fa fa-heart-o' }}"></i>
                                    </button>
                                </form>
                            </div>
                            <form class="basket-form" data-product-id="{{ $product->id }}" action="{{ route('basket.toggle', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn_basket" >
                                            <div class="between">
                                                @php
                                                    $isInBasket = \App\Models\Basket::where('user_id', auth()->id())->where('product_id', $product->id)->exists();
                                                @endphp
                                                <i class="shop fa {{ $isInBasket ? 'fa-check' : 'fa-shopping-cart' }}"></i>
                                                <p class="basket">В корзину</p>
                                            </div>
                                        </button>
                            </form>
                        </div>
                        
                    </div>
            </div>
    </div>
    
    <div class="slide">
        <h1 style="margin: 0 70% 15px 0; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; gap: 20px;">
                <p style="margin: 0;">Оценки</p>
                <p style="margin: 0;">Вопросы</p>
            </div>
            <div>
                <button id="show-review-form-btn" style="display: inline-flex; align-items: center; padding: 8px 12px; background-color: #a77734d4; color: white; border: none; border-radius: 4px; cursor: pointer;">
                <i class="fa fa-plus" style="margin-right: 8px;"></i> Добавить отзыв
                </button>
            </div>
        </h1>
        
        
        @include('reviews', ['product' => $product])
        @include('reviews_partial')
    </div>
    <script src="{{ asset('js/favorites.js') }}"></script>
    <script src="{{ asset('js/reviews.js') }}"></script>
    <script src="{{ asset('js/basket.js') }}"></script>
    <script>
        // Передаем идентификатор товара глобально
        window.productId = {{ $product->id }};
    </script>

    @include('footer')
</body>
</html>