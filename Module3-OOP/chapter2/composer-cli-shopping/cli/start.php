<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Jagaad\presentation\clicheckout;
use Jagaad\Shop\Product;
use Jagaad\Shop\Cart;
use Jagaad\Shop\Order;


//$isShopping = true;
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

    $ls = "\n-------------\n";

    $cliCheckout = new clicheckout();
  

    $cart = new Cart;
    
    while (true) {
        $cliCheckout->printAllProducts();
        echo '> Cart products: ' . count($cart->products()) . PHP_EOL;
    
        $option = readline('Choose a product: ');
    
        if ($option === 'Q') {
            break;
        }
    
        if ($option === 'L') {

            $cliCheckout->printCartProducts($cart);
            readline('Enter to continue: ');
            system('clear');
            continue;
        }
    
        if (! is_numeric($option)) {
            system('clear');
            echo "\nTry again...\n";
            continue;
        }
    
        $option = (int)$option;
        if (isset($products[$option])) {
            $selectedProduct = $products[$option];
    
            $cart->add($selectedProduct);
    
            system('clear');
            echo "{$ls}> Product {$selectedProduct->name()} added to the cart!{$ls}";
        }
    }
    
    system('clear');
    echo $ls;
    
    system('clear');
$cliCheckout->printCartProducts($cart);
    
    $order = new Order($cart);
    echo 'Total: $' . $order->total() . PHP_EOL;
    
    $inputAmount = (float)readline('Your payment amount: $');
    
    echo $ls;
    
    echo 'Order completed! :)' . PHP_EOL;
    echo "Your payment is: $ {$inputAmount}" . PHP_EOL;
    echo 'Your change amount is: $ ' . $order->pay($inputAmount);
    