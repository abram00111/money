@extends('adminlte::page')

@section('title', 'Доходы')

@section('content_header')
    <h1>Доходы</h1>
@stop

@section('content')
    <a href="{{ route('addIncome') }}" class="btn btn-success">Добавить доход</a>
    <table class="table table-bordered abr-table">
        <thead>
            <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Чек</th>
                <th>Коммент</th>
                <th>Дата</th>
                <th colspan="2">Редактировать</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->catName }}</td>
                    <td>{{ $income->price }}</td>
                    <td>{{ $income->cheque }}</td>
                    <td>{{ $income->comment }}</td>
                    <td>{{ $income->created_at }}</td>
                    <td><a href="{{ route('editIncome', ['id' => $income->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ route('delIncome', ['id' => $income->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
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
