<?php

namespace Jagaad\presentation\Option;

use Jagaad\presentation\Option;
class CheckoutOption implements option
{
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function key(): string
    {
        return 'C';
    }

    public function description(): string
    {
        return '?Go to checkout';
    }

    public function handle(): void
    {
        system('clear');
        echo 'Cart products: ' . PHP_EOL;

        foreach ($this->cart->products() as $product) {
            echo $product->name() . ' $' . $product->price() . PHP_EOL;
        }
        readline('Enter to continue: ');
        system('clear');
    }
}