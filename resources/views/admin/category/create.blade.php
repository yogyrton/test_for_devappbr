@extends('admin.layouts.layout')

@section('title', 'Добавить категорию')

@section('content')

    <a href="{{ route('categories.index') }}">Назад</a>

    <hr>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название категории</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        </div>

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
