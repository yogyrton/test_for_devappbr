@extends('admin.layouts.layout')

@section('title', 'Товары')

@section('content')

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
                        {{ $product->title }}
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

                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm delete-tag">Редактировать</a>

                        <form action="{{ route('products.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm delete-tag">Удалить</button>
                        </form>

                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

    @else

        Товаров еще нет

    @endif

@endsection
