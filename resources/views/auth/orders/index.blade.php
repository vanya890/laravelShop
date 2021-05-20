@extends('auth.layouts.app')
@section('title', 'Заказы')
@section('content')
    <div class="m-auto">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Телефон
                    </th>
                    <th>
                        Когда отправлен
                    </th>
                    <th>
                        Сумма
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}
                            @if(!is_null($order->user_id))
                                ({{ $order->user_id }})
                            @endif
                        </td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                        <td>{{ $order->getFullPrice() }} руб.</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" type="button"
                                   href="{{route('adminOrder', $order->id)}}">Открыть</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a class="btn btn-danger" type="button"
                                   href="{{route('adminOrderDelete', $order->id)}}">Удалить</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
