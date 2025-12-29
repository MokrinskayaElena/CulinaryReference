<header>
    <nav class="navigation">
        <div class="container">
            <div class="beanie">
                <!-- <div>
                    <i class='se fa fa-search'></i>
                    <input type="text" placeholder=" Поиск " class="s">
                </div> -->

                <div class="search-container">
                    
                    <form action="{{ route('products.search') }}" method="GET">
                        <i class='se fa fa-search'></i>
                        <input type="text" name="query" placeholder=" Поиск " required class="s"/>
                        <button type="submit" class="s_btn"> Найти </button>
                    </form>
                    </div>

                <img src="{{ asset('img/Logo.png') }}" alt="Логотип" class="beanie_Logo">
                <div class="beanie_mobile">
                    <img src="{{ asset('img/Logo.png') }}" alt="Логотип" class="beanie_mobile_Logo">
                    <img src="{{ asset('img/Поиск.png') }}" alt="Поиск" class="beanie_mobile_Search">
                    <img src="{{ asset('img/Меню скрытое.png') }}" alt="Меню" onclick="myFunction()" class="beanie_mobile_Menu">
                    <div id="myDropdown" class="dropdown" >
                        <div class="display"> </div>
                        <ul class="topmenu_mobile">
                            <li><a href="{{ route('homepage') }}">Главная</a></li>
                            <li><a href="{{ route('products') }}" >Продукция</a>
                                <ul class="submenu_mobile">
                                    <li><a href="">Balancy</a></li>
                                    <li><a href="">Purify</a></li>
                                    <li><a href="">Serenity</a></li>
                                    <li><a href="">Energy</a></li>
                                    <li><a href="">Healthy</a></li>
                                    <li><a href="">Spicy</a></li>
                                </ul>
                            </li>
                            <li><a href="">Контакты</a></li>
                            <li><a href="">Доставка</a></li>
                        </ul>
                    </div>
                </div> 
                <div class="bottom_menu">
                    <a href="#" class="f"> <i class=' fa fa-automobile'></i>  </a>            
                    <a href="{{ route('favorites.index') }}" class="f"> <i class=' fa fa-heart-o'></i> </a>   
                    <a href="{{ route('basket.index') }}" class="f"> <i class=' fa fa-shopping-cart'></i> </a>
                    <a href="{{ route('profile') }}" class="f"> <i class=' fa fa-sign-out'> </i> </a>
                </div>              
            </div>
            <ul class="topmenu">
                <li><a href="{{ route('homepage') }}">Главная</a></li>
                <li><a href="{{ route('products') }}" class="down">Продукция</a>
                    <ul class="submenu">
                        <li><a href="">Balancy</a></li>
                        <li><a href="">Purify</a></li>
                        <li><a href="">Serenity</a></li>
                        <li><a href="">Energy</a></li>
                        <li><a href="">Healthy</a></li>
                        <li><a href="">Spicy</a></li>
                    </ul>
                </li>
                <li><a href="">Контакты</a></li>
                <li><a href="">Доставка</a></li>
            </ul>
        </div>
    </nav>
</header>
<script src="{{ asset('js/search.js') }}"></script>