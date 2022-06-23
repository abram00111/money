@extends('adminlte::page')

@section('title', 'Редактирование категории')

@section('content_header')
    <h1>Редактирование категории</h1>
@stop

@section('content')
    <form action="{{ route('saveCategory') }}" method="POST">
        @csrf
        <input type="hidden" name="idCategory" value="{{ $category->id }}">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label for="category" class="form-label">Название категории</label>
                    <input type="text" class="form-control" name="name" id="category" value="{{ old('name', $category->name) }}" required placeholder="Продукты">
                </div>
            </div>
        </div>
        <label class="form-label">Включить категорию в группу</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" @if (old('income', $category->income) == 1 || old('income', $category->income) == 'on')checked @endif name="income" id="income">
            <label class="form-check-label" for="income">
                Доходы
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" @if (old('expenses', $category->expenses) == 1 || old('expenses', $category->expenses) == 'on')checked @endif name="expenses" id="expenses">
            <label class="form-check-label" for="expenses">
                Расходы
            </label>
        </div>
        <button class="btn btn-success">Сохранить</button>

    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
