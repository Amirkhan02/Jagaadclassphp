<?php

require_once __DIR__ . '/cart.php';
require_once __DIR__ . '/product.php';
require_once __DIR__ . '/order.php';

$computer = new Product('Laptop Linux', 1000);
$keyboard = new Product('keyboard', 50);

$cart = new Cart($computer);
$cart = new Cart($keyboard);

$order = new Order($cart);

echo 'Total: ' . $order->total() . PHP_EOL;
echo 'Your payment is: $ 1500' . PHP_EOL;
echo 'Your change amount is: $ ' . $order->pay(1500);