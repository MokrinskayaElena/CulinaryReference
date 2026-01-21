@extends('layout')

@section('title', 'Блюдо: ' . $dish->name)

@section('content')

<h2>
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm ml-2" title="Назад">
     <i class="fa fa-arrow-left"></i>
    </a>
    Блюдо: {{ $dish->name }}</h2>

<div class="mb-4">
    <h5>Категория: {{ $dish->category->name ?? 'Без категории' }}</h5>
    <h5>
        Время приготовления: {{ $dish->preparation_time }} мин.
    </h5>
</div>

<h4>Ингредиенты:</h4>
@if($dish->ingredients && $dish->ingredients->count() > 0)
<table class="table table-bordered table-striped">
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
@else
<div class="alert alert-info" role="alert">
    Ингредиенты не добавлены.
</div>
@endif

<h4>Способ приготовления:</h4>
<div class="border p-3 rounded bg-light" style="max-width: 100%; word-wrap: break-word;">
    <p>{{ $dish->preparation_method }}</p>
</div>
@endsection