@extends('layout')

@section('title', 'Все блюда')

@section('content')


<div class="d-flex align-items-center mb-3">
    <h2>Список всех блюд </h2>
    <form method="GET" action="{{ route('dishes.index') }}" class="ms-auto">
        <label for="perpage" class="form-label me-2">Количество элементов на странице:</label>
        <select name="perpage" id="perpage" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
            <option value="2" {{ $perPage == 2 ? 'selected' : '' }}>2</option>
            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
        </select>
    </form>

</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Наименование</th>
            <th>Время приготовления (мин)</th>
            <th>Пользователь</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
        <tr>
            <td>{{ $dish->id }}</td>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->preparation_time }}</td>
            <td>{{ $dish->user ? $dish->user->name : 'Нет пользователя' }}</td>
            <td>{{ $dish->category ? $dish->category->name : 'Без категории' }}</td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('dishes.ingredients', ['id' => $dish->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-external-link"></i> Перейти
                    </a>
                    <form action="{{ route('dishes.edit', $dish->id) }}" method="GET" class="d-inline">
                        <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-edit"></i> Редактировать</button>
                    </form>
                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить этот рецепт?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Удалить</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $dishes->links('vendor.pagination.custom') }}

@endsection