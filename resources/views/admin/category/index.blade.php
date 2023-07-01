@extends('admin.layouts.layout')

@section('title', 'Категории')

@section('content')

    <a href="{{ route('categories.create') }}">Добавить категорию</a>

    <hr>

    @if($categories->count() > 0)

        <table class="table table-striped projects">

            <thead>
            <tr>

                <th style="width: 20%">
                    ID
                </th>

                <th style="width: 70%">
                    Название категории
                </th>

                <th style="width: 10%">
                    Действия
                </th>

            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>

                    <td>
                        {{ $category->id }}
                    </td>

                    <td>
                        {{ $category->title }}
                    </td>

                    <td class="project-actions text-right">

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm delete-tag">Редактировать</a>

                        <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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

        Категорий еще нет

    @endif

@endsection
