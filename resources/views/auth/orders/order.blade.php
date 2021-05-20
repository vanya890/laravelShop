@extends('auth.layouts.app')

@section('title', 'Заказ №'.$order->id)

@section('content')
    <a class="btn-primary btn" href="{{route('home')}}">Вернутся</a>
    <h1>Заказ №{{$order->id}}</h1>
    <div class="panel">
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    E-Mail
                </th>
                <th>
                    Когда отправлен
                </th>
            </tr>
            <tr>
                <td>{{ $order->name }}
                    @if(!is_null($order->user_id))
                        ({{ $order->user_id }})
                    @endif
                </td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
            </tr>
            </tbody>
        </table>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>
                        <h4>
                            @if($product->image != '')
                                <img style="height: 56px" src="{{URL::to('/').'/storage/'.$product->image}}"
                                     alt="{{ $product->name }}">
                            @endif
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a>
                        </h4>
                    </td>
                    <td><span class="badge">{{ $product->pivot->count }}</span>
                    </td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->getPriceForCount() }} ₽</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
                <td>{{ $order->getFullPrice() }} ₽</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>
@endsection
