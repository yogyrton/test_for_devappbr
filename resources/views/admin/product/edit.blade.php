@extends('admin.layouts.layout')

@section('title', 'Изменить товар')

@section('content')

    <a href="{{ route('products.index') }}">Назад</a>

    <hr>

    <label for="exampleInputEmail1" class="form-label">Название товара</label> {{ $product->title }}

    <br>

    <label for="exampleInputEmail1" class="form-label">Категория</label> {{ $product->category->title }}


    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Цена</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
        </div>

        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Количество</label>
            <input type="text" name="count" class="form-control @error('count') is-invalid @enderror" value="{{ $product->count }}">
        </div>

        @error('count')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
