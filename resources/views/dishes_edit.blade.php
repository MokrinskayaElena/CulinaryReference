<title>Редактирование</title>
<h2>Редактировать блюдо</h2>
<form action="{{ route('dishes.update', $dish->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Вывод ошибок -->
    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Категория -->
    <label for="category_id">Категория</label>
    <select name="category_id" id="category_id" required>
        <option style="display:none" value="">Выберите категорию</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $dish->category_id) == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>

    <!-- Название -->
    <label for="name">Название</label>
    <input type="text" name="name" id="name" value="{{ old('name', $dish->name) }}" required><br><br>

    <!-- Метод приготовления -->
    <label for="preparation_method">Метод приготовления</label>
    <textarea name="preparation_method" id="preparation_method" required>{{ old('preparation_method', $dish->preparation_method) }}</textarea><br><br>

    <!-- Время -->
    <label for="preparation_time">Время приготовления (мин)</label>
    <input type="number" name="preparation_time" id="preparation_time" value="{{ old('preparation_time', $dish->preparation_time) }}" required min="1"><br><br>

    <!-- Кнопки "Добавить" и "Отмена" -->
    <div style="display: flex; gap: 11px;">
        <button type="submit">Обновить</button>
        <a href="{{ route('dishes.index') }}" 
           style="padding: 3px 6px; background-color: #f44336; color: white; text-decoration: none; border-radius: 2px;">
            Отмена
        </a>
    </div>
</form>