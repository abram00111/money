@extends('adminlte::page')

@section('title', 'Категории')

@section('content_header')
    <h1>Категории</h1>
@stop

@section('content')
    <a href="{{ route('addCategory') }}" class="btn btn-success">Добавить категорию</a>
    <table class="table table-bordered abr-table" >
        <thead>
            <tr>
                <th>Категория</th>
                <th>Кол. подкатегорий</th>
                <th colspan="2">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('subCategoryInCategory', ['id'=>$category->id]) }}">{{ $category->sum }}</a></td>
                    <td><a href="{{ route('editCategory', ['id'=>$category->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ route('delCategory', ['id'=>$category->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
