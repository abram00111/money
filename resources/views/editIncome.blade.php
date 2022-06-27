@extends('adminlte::page')

@section('title', 'Редактировать доход')

@section('content_header')
    <h1>Редактирование дохода</h1>
@stop

@section('content')
    <form action="{{ route('saveIncome') }}" method="POST">
        @csrf
        <input type="hidden" name="money_id" value="{{ $money->id }}">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <select class="selectpicker form-control" name="category" required data-live-search="true">
                        @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category', $category->id) == $money->category_id) selected="selected" @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label class="form-label">Подкатегория</label>
                    <select class="selectpicker form-control" name="subCategory" data-live-search="true">
                        @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" data-parent-id="{{ $subCategory->category_id }}" @if (old('subCategory', $subCategory->id) == $money->subCategory_id) selected="selected" @endif>{{ $subCategory->name }} 
                                </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label class="form-label">Продукт</label>
                    <select class="selectpicker form-control" name="product" data-live-search="true">
                        @foreach ($products as $product)
                            @if ($loop->first)
                                <option value="{{ $product->id }}">{{ $product->name }}
                                </option>
                            @else
                                <option value="{{ $product->id }}">{{ $product->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="mb-3">
                    <label for="price" class="form-label">Сумма</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $money->price }}" required
                        placeholder="100">
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="mb-3">
                    <label for="date" class="form-label">Дата</label>
                    <input type="date" class="form-control" name="date" id="date" required value="{{ date('Y-m-d', strtotime($money->date)) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Комментарий</label>
                    <textarea class="form-control" aria-label="With textarea" name="comment">{{ $money->comment }}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Сохранить</button>

    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="/js/changeSelect.js"></script>
@stop
