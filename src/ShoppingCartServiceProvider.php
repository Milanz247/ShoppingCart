<?php

namespace YourVendorName\ShoppingCart;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use YourVendorName\ShoppingCart\Http\Livewire\Cart;

class ShoppingCartServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the package's routes, configuration, etc.
    }

    public function boot()
    {
        // Register the Livewire component
        Livewire::component('cart', Cart::class);

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/shopping-cart'),
        ], 'views');
    }
}
