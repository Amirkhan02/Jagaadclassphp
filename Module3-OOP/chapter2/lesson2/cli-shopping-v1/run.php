<?php

require_once __DIR__ . '/cart.php';
require_once __DIR__ . '/product.php';
require_once __DIR__ . '/order.php';

$isShopping = true;
/*
echo <<<OUTPUT
    1: Continue shopping
    2: Go to the checkout
    3: Quit \n\n
    OUTPUT;
*/


    $products = [
        new Product('Laptop Linux', 1000),
        new Product('keyboard', 50),
        new Product('Mouse', 100),
        new Product('Monitor', 500),
    ];
    $ls = '\n------------------\n';
    $productsOutput = "{$ls}Product list: \n";

    foreach($product as $key => $product) {
        $product = $key . ': ' . $product->name() . '$' . $product->price() . PHP_EOL;
    }
    $productsOutput = "{$ls}Q: To quit\nL: List cart products\n\n";

    $cart = new Cart;

    while (true) {
        
        echo $productsOutput;
        echo 'Cart products: ' . count($cart->products()) . PHP_EOL;

        $options = readline('Choose an option:');

    if ($option == 'Q') {
        break;
    }
    if ($option == 'L') {
        system('clear');
        echo "{ls}Cart products:\n";
        foreach($cart->products as $key => $product) {
            echo $key . ': ' . $product->name() . '$' . $product->price() . PHP_EOL;
        }
        readline('Enter to continue:');

        system('clear');
        continue;
    }

    if (! is_numeric($option)) {
        system('clear');
        echo "\nTry again..\n";
        continue;
    }
    $option = (int)$option;
    if (isset($products[$option])) {
        $selectedProduct = $products[$option];

        $cart->add($products[$option]);

        system('clear');
        echo "{$ls}Product {$selectedProduct->name()} added to the cart!{$ls}\n\n";
    }
}
system('clear');


echo $ls;
//@todo reuse this code
foreach($cart->products as $key => $product) {
    echo $key . ': ' . $product->name() . '$' . $product->price() . PHP_EOL;
}

$order = new Order($cart);
echo 'Total: $' . $order->total() . PHP_EOL;

$inputAmount = (float)readline('Your payment amount: $');

echo $ls;

echo 'Order completed! :' . PHP_EOL;
echo "Your payment is: $ {$inputAmount}" . PHP_EOL;
echo 'Your change amount is: $ ' . $order->pay($inputAmount);
