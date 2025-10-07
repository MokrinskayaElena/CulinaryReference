<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Блюдо: {{ $dish->name }}</title>
</head>
<body>
<h2>Блюдо: {{ $dish->name }} </h2>
<h4>Категория: {{ $dish->category->name ?? 'Без категории' }}</h4>
<h4>Время приготовления: {{ $dish->preparation_time }} мин.</h4>

<h4>Ингредиенты:</h4>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Количество</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dish->ingredients as $ingredient)
        <tr>
            <td>{{ $ingredient->id }}</td>
            <td>{{ $ingredient->name }}</td>
            <td>{{ $ingredient->pivot->quantity }} {{ $ingredient->unit_of_measurement }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h4>Способ приготовления:</h4>
<p> {{ $dish->preparation_method }}</p>
</body>
</html>