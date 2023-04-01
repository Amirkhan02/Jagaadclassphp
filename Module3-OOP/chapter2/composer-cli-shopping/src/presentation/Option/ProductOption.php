<?php

namespace Jagaad\presentation\Option;
use Jagaad\Shop\Carrt;
use Jagaad\Shop\Product;
abstract class ProductOption
{
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function handle(Product $product): void
    {
        $this->cart->add(Product);
        system (clear);
        echo 'Product "'. $product->name(). " added to the cart' . PHP_EOL;
    }
   }
