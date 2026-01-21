@extends('layout')

@section('title', 'Создание нового блюда')

@section('content')
<h2 class="mb-4">Добавить новое блюдо</h2>
<form action="{{ route('dishes.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

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

    <!-- Категории -->
    <div class="mb-3">
        <label for="category_id" class="form-label">Категория</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Выберите категорию</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Название -->
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <!-- Метод приготовления -->
    <div class="mb-3">
        <label for="preparation_method" class="form-label">Метод приготовления</label>
        <textarea name="preparation_method" id="preparation_method" class="form-control" rows="4" required>{{ old('preparation_method') }}</textarea>
    </div>

    <!-- Время приготовления -->
    <div class="mb-3">
        <label for="preparation_time" class="form-label">Время приготовления (мин)</label>
        <input type="number" name="preparation_time" id="preparation_time" class="form-control" value="{{ old('preparation_time') }}" required min="1">
    </div>

    <!-- Кнопки "Добавить" и "Отмена" -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Добавить</button>
        <a href="{{ route('dishes.index') }}" class="btn btn-danger">Отмена</a>
    </div>
</form>
@endsection