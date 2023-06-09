<?php
require_once __DIR__ . '/Cart.php';
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Order.php';



$computer = new Product('Laptop Linux', 1000);
$Keyboard = new Product('Keyboard', 50);

$cart = new Cart($computer);
$cart->add($Keyboard);

$order = new Order($cart);

echo 'Total: ' . $order->total() . PHP_EOL;
echo 'Your payment is: $ 1500' . PHP_EOL;
echo 'Your Change is: $ ' . $order->pay(1500);