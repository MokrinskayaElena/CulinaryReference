<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Кулинарный справочник')</title>
    <!-- Подключение Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Подключение Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

    @stack('styles')
</head>
<body>
    <header class="container py-3">
        <!-- <h1 class="text-center"> Кулинарный справочник </h1> -->
         @include('beanie')
    </header>

    <!-- Основной контент -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Подвал сайта -->
    <footer class="container py-3 text-center">
        &copy; {{ date('Y') }} Кулинарный справочник
    </footer>

    <!-- Скрипты Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>