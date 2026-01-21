@extends('layout')

@section('title', 'Список категорий')

@section('content')
<h2>Список категорий:</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Наименование</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.show', ['id' => $category->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-external-link"></i> Перейти
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection