<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Все блюда с категориями</title>
</head>
<body>
    <h2>Список всех блюд с категориями</h2>

<div style="display: flex; align-items: center; margin-bottom: 15px;">

    <form method="GET" action="{{ route('dishes.index') }}" style="margin-left:1rem;">
    <label for="perpage">Количество элементов на странице:</label>
    <select name="perpage" id="perpage" onchange="this.form.submit()">
        <option value="2" {{ $perPage == 2 ? 'selected' : '' }}>2</option>
        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
    </select>
    </form>
        <form action="{{ route('dishes.create') }}">
        <button style="margin-left: 7rem; padding:8px 12px; background-color:#4CAF50; color:white; border-radius:4px;">Добавить новый рецепт</button>
    </form>
</div>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>Наименование</th>
            <!-- <th>Способ приготовления</th> -->
            <th>Время приготовления (мин)</th>
            <!-- <th>Создано</th>
            <th>Обновлено</th> -->
            <th>Пользователь</th>
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
            <td>{{ $dish->updated_at }}</td> -->
            <td>{{ $dish->user ? $dish->user->name : 'Нет пользователя' }}</td>
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
<!-- Элементы управления пагинацией -->
 {{ $dishes->appends(request()->except('page'))->links() }}
 <!-- {{ $dishes->appends(['perpage' => $perPage])->links() }} -->
<!-- {{ $dishes->links() }} -->
</body>
</html>