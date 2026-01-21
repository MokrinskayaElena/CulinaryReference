@extends('layout')

@section('title', 'Блюда категории')

@section('content')
<h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm ml-2" title="Назад">
        <i class="fa fa-arrow-left"></i>
    </a>
    Список блюд категории: {{ $category ? $category->name : 'Неверный ID категории' }}
</h2>

@if($category && $category->dishes && $category->dishes->count() > 0)
<div class="d-flex align-items-center mb-3">
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <!-- <th>category_id</th> -->
            <th>Наименование</th>
            <th>Способ приготовления</th>
            <th>Время приготовления (мин)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category->dishes as $dish)
        <tr>
            <td>{{ $dish->id }}</td>
            <!-- <td>{{ $dish->category_id }}</td> -->
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->preparation_method }}</td>
            <td>{{ $dish->preparation_time }}</td>
            <td>
                <a href="{{ route('dishes.ingredients', ['id' => $dish->id]) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-external-link"></i> Перейти
                </a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-info" role="alert">
    Блюда отсутствуют или категория не найдена.
</div>
@endif
@endsection