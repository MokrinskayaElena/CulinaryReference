@extends('layout')

@section('content')
<h2>
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm ml-2" title="Назад">
        <i class="fa fa-arrow-left"></i>
    </a>
    Результаты поиска по запросу: "{{ $query }}"
</h2>

@if($dishes->isEmpty())
    <p>Ничего не найдено</p>
@else
    <ul class="list-group">
        @foreach($dishes as $dish)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $dish->name }}</span>
                <a href="{{ route('dishes.ingredients', ['id' => $dish->id]) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-external-link"></i> Перейти
                </a>
            </li>
        @endforeach
    </ul>
@endif

@if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
@endsection