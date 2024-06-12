<?php

// packages/YourVendorName/ShoppingCart/src/Http/Livewire/Cart.php

namespace YourVendorName\ShoppingCart\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = Session::get('cart', []);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => isset($this->cart[$productId]) ? $this->cart[$productId]['quantity'] + 1 : 1
            ];
            Session::put('cart', $this->cart);
        }
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            Session::put('cart', $this->cart);
        }
    }

    public function render()
    {
        $products = Product::all();
        return view('shopping-cart::cart', ['products' => $products]);
    }
}
