@extends('adminlte::page')

@section('title', 'Добавить доход')

@section('content_header')
    <h1>Добавление дохода</h1>
@stop

@section('content')
    <form action="{{ route('storeIncome') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <select class="selectpicker form-control" name="category" required data-live-search="true">
                        @foreach ($categories as $category)
                            @if ($loop->first)
                                <option value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label class="form-label">Подкатегория</label>
                    <select class="selectpicker form-control" name="subCategory" data-live-search="true">
                        @foreach ($subCategories as $subCategory)
                            @if ($loop->first)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}
                                </option>
                            @else
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-4">
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
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="mb-3">
                    <label for="price" class="form-label">Цена за шт</label>
                    <input type="number" class="form-control" name="price" id="price" required
                        placeholder="100">
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="mb-3">
                    <label for="col" class="form-label">Кол-во</label>
                    <input type="number" class="form-control" name="col" min="1" value="1" id="col" required
                        placeholder="100">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Комментарий</label>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
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
@stop
