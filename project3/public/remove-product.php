<?php
use OnlineShopping3\Model\Cart;
//use OnlineShopping\Application;

require_once __DIR__ . '/../init.php';

$id = filter_input(INPUT_GET, 'id');


$cart = unserialize($_SESSION['cart']);
$cart->remove($id);
$_SESSION['cart'] = serialize($cart);

echo "Product <i><b>$id</b></i> removed from the product :) <br><br>";

echo '<i><a href="index.php"> << All products</a></i><br><br>';

echo '<i><a href="my-product.php">>> My Product</a></i>';
