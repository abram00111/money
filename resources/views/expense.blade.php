@extends('adminlte::page')

@section('title', 'Расходы')

@section('content_header')
    <h1>Расходы</h1>
@stop

@section('content')
    <a href="{{ route('addExpense') }}" class="btn btn-success">Добавить расход</a>
    <table class="table table-bordered abr-table">
        <thead>
            <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Коммент</th>
                <th>Дата</th>
                <th colspan="2">Редактировать</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->catName }}</td>
                    <td>{{ $expense->price }}</td>
                    <td>{{ $expense->comment }}</td>
                    <td>{{ date('d.m.Y', strtotime($expense->date)) }}</td>
                    <td><a href="{{ route('editExpense', ['id' => $expense->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ route('delExpense', ['id' => $expense->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
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
