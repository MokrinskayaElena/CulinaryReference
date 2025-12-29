<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Корзина</title>
    <link href="fonts/gotham pro/stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
</head>
<body>
    @include('beanie')
     <section class="section1">
      <div class="above">
      </div>
    </section>
    <div class="slider">
        <div class="line line1"></div>
        <div class="between">
            <h2 class="section2_h2"> КОРЗИНА</h2>
            <div class="line line2"></div>
        </div>

        <div class="pagination top-pagination">
            {{ $products->links('vendor.pagination.custom') }}
        </div>

        <div class="slides">
                @foreach($products as $basketItem)
                    @php
                        $product = $basketItem->product;
                        $isInBasket = true; // так как это корзина
                    @endphp
            <div class="slide">
                <div class="above">
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
                    <!-- Карточка товара -->
                    <div class="Card">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration: none; color: inherit;">  
                        <div>
                            <img class="Product" src="{{ $product->image_url }}" alt="{{ $product->name }}" />
                               <p>{{ $product->price }}₽</p>              
                                    <div class="between">
                                        <div>
                                            <i class="fa fa-star" style="color: gold; margin-right: 8px; font-size: 1.2em;"></i>
                                            <span style="font-size: 1em;">{{ number_format($product->reviews_avg_rating ?? 0, 1) }}</span>
                                            <span style="margin-left: 10px; font-size: 0.9em; color: #555;">Оценок: {{ $product->reviews_count ?? 0 }}</span>
                                        </div>
                                    </div>
                                <p>{{ \Illuminate\Support\Str::limit($product->name, 19) }}</p>
                        </div>
                        </a>
                        <!-- Кнопка "В корзину" внутри карточки -->
                        <form class="basket-form" data-product-id="{{ $product->id }}" action="{{ route('basket.toggle', $product->id) }}" method="POST" style="margin-top:10px;">
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
            @endforeach
        </div>

            {{ $products->links('vendor.pagination.custom') }}
    </div>
    <script src="{{ asset('js/product.js') }}"></script>
    <script src="{{ asset('js/favorites.js') }}"></script>
    <script src="{{ asset('js/basket.js') }}"></script>
    @include('footer')
</body>
</html>