@extends('layouts.app')

@section('title', 'Изменить товар')

@section('content')

    <a href="{{ route('main') }}">Назад</a>

    <hr>

    <label for="exampleInputEmail1" class="form-label">Название товара</label> {{ $product->title }}

    <br>

    <label for="exampleInputEmail1" class="form-label">Категория</label> {{ $product->category->title }}

    <br>

    <label for="exampleInputEmail1" class="form-label">Цена</label> {{ $product->price }}

    <br>

    <label for="exampleInputEmail1" class="form-label">Количество</label> {{ $product->count }}


    @if($messages->count() > 0)
        <hr>
        <h3>Сообщения</h3>

        @foreach($messages as $message)
            <hr>

            <div class="messageInChat">

                <div>
                    Текст: {{ $message->message }}<br>
                    Кто: {{ $message->user->name }}<br>
                    Время: {{ $message->created_at }}<br>
                </div>

                <hr>

            </div>

        @endforeach

    @else

        <hr>
        <h3>Сообщений еще нет</h3>
        <hr>
    @endif

    @auth()

        <form action="{{ route('message.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Сообщение</label>
                <input type="text" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
            </div>

            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Добавить сообщение</button>
        </form>

    @endauth



    @guest()

        <h3>Чтобы оставить сообщение
            <a href="{{ route('login') }}">Войдите</a><br>
            или
            <a href="{{ route('register') }}">Зарегистрируйтесь</a>

        </h3>

    @endguest
@endsection
