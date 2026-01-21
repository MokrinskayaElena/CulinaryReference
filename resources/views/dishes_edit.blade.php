@extends('layout')

@section('title', 'Редактирование блюда')

@section('content')
<h2 class="mb-4">Редактировать блюдо</h2>
<form action="{{ route('dishes.update', $dish->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <!-- Вывод ошибок -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Категория -->
    <div class="mb-3">
        <label for="category_id" class="form-label">Категория</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="" disabled {{ old('category_id', $dish->category_id) ? '' : 'selected' }}>Выберите категорию</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $dish->category_id) == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Название -->
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
    </div>

    <!-- Метод приготовления -->
    <div class="mb-3">
        <label for="preparation_method" class="form-label">Метод приготовления</label>
        <textarea name="preparation_method" id="preparation_method" class="form-control" rows="4" required>{{ old('preparation_method', $dish->preparation_method) }}</textarea>
    </div>

    <!-- Время -->
    <div class="mb-3">
        <label for="preparation_time" class="form-label">Время приготовления (мин)</label>
        <input type="number" name="preparation_time" id="preparation_time" class="form-control" value="{{ old('preparation_time', $dish->preparation_time) }}" required min="1">
    </div>

    <!-- Кнопки "Обновить" и "Отмена" -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="{{ route('dishes.index') }}" class="btn btn-danger">Отмена</a>
    </div>
</form>
@endsection