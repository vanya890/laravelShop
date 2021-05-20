<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
        </div>
        @if($product->image != '')
            <img src="{{URL::to('/').'/storage/'.$product->image}}" alt="{{ $product->name }}">
        @endif
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} ₽</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                       class="btn btn-default"
                       role="button">Подробнее</a>
                    @csrf
                </form>
            </p>
        </div>
    </div>
</div>