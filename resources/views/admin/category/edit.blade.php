@extends('admin.layouts.layout')

@section('title', 'Изменить категорию')

@section('content')

    <a href="{{ route('categories.index') }}">Назад</a>

    <hr>

    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название категории</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->title }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100</div>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
