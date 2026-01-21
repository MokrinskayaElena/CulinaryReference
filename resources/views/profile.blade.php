<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link href = "fonts/gotham pro/stylesheet.css" rel = "stylesheet" type = "text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>
<body>
    @include('beanie')

    <section clascc="global_section">
    <h1>Ваш профиль</h1>
    <section class="section">       
        <div class="between">
            <div>
                <div class="between">
                    <div class="section1">
                        <i class='user fa fa-user-circle-o'></i> <br>
                        <button class="button"> <i class='fas fa fa-cog'> Настройки </i></button><br>
                        <button class="button"> <i class='fas fa fa-lock'> Безопасность </i></button><br>
                        <form action="{{ route('logout') }}">
                            <button class="button" id="logoutButton"> Выйти </button>
                        </form>
                    </div>
                    <div class="section2">
                        <h2> Информация о пользователе </h2>
                        <!-- <div id="userInfo"></div><br> -->
                         <p>Здравствуйте, {{ $user->name }}</p>
                         <p>Ваша почта: {{ $user->email }}</p>
                         <p>Дата регистрации: {{ $user->created_at }}</p>
                        <div>
                            <button class="button"> <i class='fas fa fa-automobile'> Доставка </i></button><br>
                            <button class="button"> <i class='fas fa fa-heart-o'> Избранное </i></button><br>
                            <button class="button"> <i class='fas fa fa-shopping-cart'> Корзина </i></button><br>
                            <button class="button"> <i class='fas fa fa-hourglass-start'> Ждут оценки </i></button><br>
                            <button class="button"> <i class='fas fa fa-dollar'> Купленные товары </i></button><br>
                            <button class="button"> <i class='fas fa fa-bar-chart-o'> Статистика покупок </i></button><br>
                        </div>                   
                    </div>              
                </div>
            </div>     
            <div class="section3">
                <h2> Ваши карты </h2>
                <i class='user fa fa-credit-card-alt'></i><br>
                <button class="button btn"> + Добавить способ оплаты </button>
            </div>
            <div class="section1_mobile">
                <i class='user fa fa-user-circle-o'></i> <br>
                <button class="button"> <i class='fas fa fa-cog'> Настройки </i></button><br>
                <button class="button"> <i class='fas fa fa-lock'> Безопасность </i></button><br>
                <button class="button btn" id="logoutButton"> Выйти </button>
            </div>
        </div>        
    </section>
</section>
    @include('footer')
</body>
</html>