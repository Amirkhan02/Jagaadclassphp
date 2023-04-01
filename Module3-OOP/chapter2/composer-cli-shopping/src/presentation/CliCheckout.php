<?php

namespace Jagaad\presentation;
use Jagaad\Shop\Cart

class CliCheckout
{
    private const LS = "\n-------------\n";

    /**
     * @param product[] $products
     * @return void
     */

    public function printAllProducts(array $products) : void
    {
        $ls = "\n-------------\n";
        $productsOutput = "{$ls}Product list: \n";
        foreach ($products as $key => $product) {
            $productsOutput .= $key . ': ' . $product->name() . ' $' . $product->price() . PHP_EOL;
        }
        echo "{$ls}Q: To quit\nL: List cart products\n\n";
        echo $productsOutput;
    }

public function printCartProducts(Cart $cart) : void

{
    system('clear');
    echo   self::LS . " Cart products:\n";
    foreach ($cart->products() as $key => $product) {
        echo $key . ': ' . $product->name() . ' $' . $product->price() . PHP_EOL;
    }
}
}