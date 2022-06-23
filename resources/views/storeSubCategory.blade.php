@extends('adminlte::page')

@section('title', 'Добавить подкатегорию')

@section('content_header')
    <h1>Добавление подкатегории</h1>
@stop

@section('content')
    <form action="{{ route('storeSubCategory') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label for="category" class="form-label">Название подкатегории</label>
                    <input type="text" class="form-control" name="name" id="category" required
                        placeholder="Хлебобулочные изделия">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label class="form-label">в какую категорию входит?</label>
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
        </div>

        <button class="btn btn-success">Сохранить</button>

    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
