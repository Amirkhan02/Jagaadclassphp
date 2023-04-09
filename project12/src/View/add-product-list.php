<?php

use OnlineShopping3\Model\Cart;
use OnlineShopping3\Model\Product;


$product = findProductById(filter_input(INPUT_GET, 'id',));

$sessionCart = $_SESSION['cart'] ?? null;
$cart = null === $sessionCart
    ? new Cart()
    : unserialize($sessionCart);

$cart->add($product);

$_SESSION['cart'] = serialize($cart);

echo "List <i><b>$product->name</b></i> added to the product:) <br><br>";

echo '<i><a href="home.php"> << All products</a></i><br><br>';

echo '<i><a href="my-product.php">>> My product</a></i>';