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
                <th colspan="2">Редактировать</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moneys as $money)
                <tr style="background: @if ($money->status == '+') #28a7456e; @else #bc374378; @endif" >
                    <td>{{ $money->category }}</td>
                    <td>{{ $money->price }}</td>
                    <td></td>
                    <td>{{ date('d.m.Y', strtotime($money->date)) }}</td>
                    <td><a href="{{ route('editMoney', ['id' => $money->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ route('delMoney', ['id' => $money->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
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
