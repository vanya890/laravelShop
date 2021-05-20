@extends('auth.layouts.app')
@section('title', 'Товары')
@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Добавить товар</a>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th><th>Код</th><th>Название</th><th>Категория</th><th>Действия</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    @if(!is_null($product->category))
                        <td>{{ $product->category->name }}</td>
                    @else
                        <td class="text-danger">Категория удалена/не указана</td>
                    @endif
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                {{--<a class="btn btn-success" type="button"
                                href="{{ route('skus.index', $product) }}">Skus</a>--}}
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{{ $products->links() }}--}}
    </div>
@endsection
