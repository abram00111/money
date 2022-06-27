@extends('adminlte::page')

@section('title', 'Редактирование подкатегории')

@section('content_header')
    <h1>Редактирование подкатегории</h1>
@stop

@section('content')
    <form action="{{ route('saveSubCategory') }}" method="POST">
        @csrf
        <input type="hidden" name="idSubCategory" value="{{ $subCategory->id }}">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label for="subCategory" class="form-label">Название подкатегории</label>
                    <input type="text" class="form-control" name="name" id="subCategory"
                        value="{{ old('name', $subCategory->name) }}" required placeholder="Продукты">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label class="form-label">в какую категорию входит?</label>
                    <select class="selectpicker form-control" name="subCategory" required data-live-search="true">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (old('subCategory', $subCategory->category_id) == $category->id) selected="selected" @endif>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
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
