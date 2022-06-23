@extends('adminlte::page')

@section('title', 'Подкатегории')

@section('content_header')
    <h1>Категории</h1>
@stop

@section('content')
    <a href="{{ route('addSubCategory') }}" class="btn btn-success">Добавить подкатегорию</a>
    <table class="table table-bordered abr-table">
        <thead>
            <tr>
                <th>Подкатегория</th>
                <th>Категория</th>
                <th colspan="2">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subCategories as $subCategory)
                <tr>
                    <td>{{ $subCategory->name }}</td>
                    <td>{{ $subCategory->nameCat }}</td>
                    <td><a href="{{ route('editSubCategory', ['id'=>$subCategory->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ route('delSubCategory', ['id'=>$subCategory->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
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
