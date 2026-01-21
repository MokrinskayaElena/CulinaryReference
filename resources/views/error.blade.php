@extends('layout')

@section('title', 'Ошибка')

@section('content')
<div class="text-center">
    <h2 class="text-danger mb-4">{{ $message }}</h2>
    <a href="{{ url('dishes') }}" class="btn btn-primary">Назад</a>
</div>
@endsection