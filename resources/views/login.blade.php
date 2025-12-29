<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и Вход</title>

    <link href="fonts/gotham pro/stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat&display=swap" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <p><a name="Регистрация и вход"></a></p>
    <section>
<div class="between">
    <!-- Входная форма -->
    <div class="Forma">
        <h1>Вход</h1>
        @if(!$user)
        <form method="post" action="{{ url('auth') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            @error('email')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
            <input type="password" name="password" placeholder="Пароль" value="{{ old('password') }}" required />
            @error('password')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
            <button type="submit">Войти</button><br><br><br><br><br>
            <a href="{{ route('homepage') }}" class="back"><i class='fa fa-outdent'></i> Назад</a>
        </form>
        @if(session('error'))
            @include('error')
        @endif
        @else
            <!-- <h2>Здравствуйте, {{ $user->name }}</h2>
            <a href="{{ route('logout') }}">Выйти из системы</a> -->
        @endif
    </div>
    <!-- Регистрация -->
    <div class="Forma">
        <h1>Регистрация</h1>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Имя пользователя" required />
            @error('name')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
            <input type="email" name="email" placeholder="Email" required />
            @error('email')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
            <input type="password" name="password" placeholder="Пароль" required />
            @error('password')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</div>
</section>
</body>
</html>