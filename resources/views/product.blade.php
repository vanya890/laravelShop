@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <h1>{{ $product->name }}</h1>
    <h2>Цена: <b>{{ $product->price }} ₽</b></h2>
    @if($product->image != '')
        <img style="max-width: 40vw; max-height:40vh" src="{{URL::to('/').'/storage/'.$product->image}}" alt="{{ $product->name }}">
    @endif
    <p>{{ $product->description }}</p>

    <form action="{{ route('basket-add', $product->id) }}" method="POST">
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

        @csrf
    </form>
@endsection
