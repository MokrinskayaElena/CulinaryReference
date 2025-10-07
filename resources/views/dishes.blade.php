<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Все блюда с категориями</title>
</head>
<body>
<div style="display: flex; align-items: center; margin-bottom: 15px;">
    <h2 style="margin: 0;">Список всех блюд с категориями</h2>
    <a href="{{ route('dishes.create') }}"
       style="margin-left: 4rem; padding:8px 12px; background-color:#4CAF50; color:white; text-decoration:none; border-radius:4px;">
        Добавить новый рецепт
    </a>
</div>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>Наименование</th>
            <!-- <th>Способ приготовления</th> -->
            <th>Время приготовления (мин)</th>
            <!-- <th>Создано</th>
            <th>Обновлено</th>
            <th>Пользователь</th> -->
            <th>Категория</th>
            <th>Действия</th> <!-- добавляем колонку для действий -->
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
        <tr>
            <td>{{ $dish->id }}</td>
            <td>{{ $dish->name }}</td>
            <!-- <td>{{ $dish->preparation_method }}</td> -->
            <td>{{ $dish->preparation_time }}</td>
            <!-- <td>{{ $dish->created_at }}</td>
            <td>{{ $dish->updated_at }}</td>
            <td>{{ $dish->user_id }}</td> -->
            <td>{{ $dish->category ? $dish->category->name : 'Без категории' }}</td>
            <td>
            <div style="display: inline-flex; gap: 10px;">
                <!-- Кнопка редактирования -->
                <form action="{{ route('dishes.edit', $dish->id) }}" method="GET" style="margin:0;">
                    <button type="submit">Редактировать</button>
                </form>
                
                <!-- Кнопка удаления -->
                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Удалить этот рецепт?')">Удалить</button>
                </form>
            </div>
        </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
<br>

</body>
</html>