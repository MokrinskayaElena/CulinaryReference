<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid d-flex align-items-center flex-wrap">
    <!-- Кнопки с иконками -->
    <a href="{{ route('dishes.index') }}" class="btn btn-secondary btn-sm me-2" title="Главная">
      <i class="fa fa-home"></i>
    </a>
    <a href="{{ route('dishes.index') }}" class="btn btn-secondary btn-sm me-2" title="Рецепты">
      <i class="fa fa-book"></i> Рецепты
    </a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm me-2" title="Категории">
      <i class="fa fa-list"></i> Категории
    </a>
    <!-- Кнопка добавления -->
    <form action="{{ route('dishes.create') }}" class="me-2">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-plus"></i> Добавить новый рецепт
      </button>
    </form>
    <!-- Поиск -->
    <form method="GET" action="{{ route('search') }}" class="d-flex flex-grow-1" style="max-width: 600px;">
      <div class="input-group w-100">
        <input type="text" class="form-control" placeholder="Поиск по рецептам и материалам" aria-label="Поиск" name="query" value="{{ request('query') }}">
        <button class="btn btn-outline-secondary" type="button" title="Настройки фильтров">
          <i class="fa fa-sliders"></i>
        </button>
        <button class="btn btn-primary" type="submit" title="Поиск">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
    <!-- Профиль/вход -->
    <div class="d-flex ms-2">
      @if(Auth::check())
        <a href="{{ route('login') }}" class="btn btn-outline-primary" title="Профиль">
          <i class="fa fa-user"></i>
        </a>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline-secondary" title="Войти">
          <i class="fa fa-sign-in"></i>
        </a>
      @endif
    </div>
  </div>
</nav>
=======
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
>>>>>>> 857e460c99daa90c8d3a6f945bcfd54ed7e8850e
