<?php

use Project3\Controller\Product;

//require_once __DIR__ . '/../db.php';

$list = findProductList(filter_input(INPUT_GET, 'id'));

$sessionProduct = $_SESSION['product'] ?? null;
$product = null === $sessionProduct
    ? new product()
    : unserialize($sessionProduct);

$product->add($list);

$_SESSION['product'] = serialize($product);

echo "
product <i><b>$list->name</b></i> added to cart :) <br><br>";

echo '<i><a href="index.php"> << All product</a></i><br><br>';

echo '<i><a href="cart.php">>> My Ordered List</a></i>';
