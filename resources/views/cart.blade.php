
<div>
    <h1>Products</h1>
    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
                <button wire:click="addToCart({{ $product->id }})">Add to Cart</button>
            </li>
        @endforeach
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        @foreach($cart as $item)
            <li>
                {{ $item['name'] }} - ${{ $item['price'] }} x {{ $item['quantity'] }}
                <button wire:click="removeFromCart({{ $item['id'] }})">Remove</button>
            </li>
        @endforeach
    </ul>

    <h3>Total: ${{ array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cart)) }}</h3>
</div>
