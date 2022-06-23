@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <table class="table table-bordered abr-table" >
        <thead>
            <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Чек</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
