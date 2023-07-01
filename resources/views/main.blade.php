@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <form action="{{ route('main') }}">
        <label class="p-3" for="search">Поиск</label><input type="text" name="search" id="search" value="{{ request()->search }}">

        <label for="exampleInputEmail1" class="form-label">Категории: </label>
        <select class="p-3" name="category_id">
            <option value="{{ request()->category_id }}">@if(request()->category_id)
                    {{ \App\Models\Admin\Category::query()->find(request()->category_id)->title
                                }}
                @endif</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <br>
        <label class="p-3" for="min_price">Цена: от </label><input type="number" name="min_price" value="{{ request()->min_price }}">
        <label class="p-3" for="max_price">до: </label><input type="number" name="max_price" value="{{ request()->max_price }}">
        <label class="p-3" for="count">Количество: </label><input type="number" name="count" value="{{ request()->count }}">

        <button class="btn btn-primary" type="submit">Найти</button>

        <a class="btn btn-danger" href="{{ route('main') }}">Сброс</a>
    </form>

    @if($products->count() > 0)

        <table class="table table-striped projects">

            <thead>
            <tr>

                <th style="width: 10%">
                    ID
                </th>

                <th style="width: 20%">
                    Название товара
                </th>

                <th style="width: 20%">
                    Категория
                </th>

                <th style="width: 20%">
                    Цена
                </th>

                <th style="width: 20%">
                    Количество
                </th>

                <th style="width: 10%">
                    Действия
                </th>

            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>

                    <td>
                        {{ $product->id }}
                    </td>

                    <td>
                        <a href="{{ route('home.show', $product->id) }}">{{ $product->title }}</a>
                    </td>

                    <td>
                        {{ $product->category->title }}
                    </td>

                    <td>
                        {{ $product->price }} р.
                    </td>

                    <td>
                        {{ $product->count }}
                    </td>

                    <td class="project-actions text-right">


                        <form action="" method="post">
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm delete-tag">Добавить</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links('vendor.pagination.bootstrap-5') }}
    @else

        Товаров еще нет

    @endif

@endsection
