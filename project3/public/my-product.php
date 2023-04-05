<?php

use OnlineShopping3\Model\Cart;
//use OnlineShopping3\Application;

require_once __DIR__ . '/../init.php';

$sessionCart = $_SESSION['cart'] ?? null;
$sessionCart = null === $sessionCart
    ? new Cart()
    : unserialize($sessionCart);

echo '<h1>My product</h1>';

echo '<b><small>Qty: ' . count($sessionCart->products()) . '</small></b>';

echo '<ul>';
foreach ($sessionCart->products() as $product) {
    echo "<li>$product->name [$product->id], $product->description, $product->price, $product->quantity| <a href='remove-product.php?id=$product->id'>Remove</a></li>";
}
echo '</ul>';

echo '<i><a href="index.php"> << All products</a></i>';




