<?php

use Project3\Controller\Product;

//require_once __DIR__ . '/../init.php';

$id = filter_input(INPUT_GET, 'id');

/** @var Product $product */
$product = unserialize($_SESSION['product']);
$product->remove($id);
$_SESSION['product'] = serialize($product);

echo "Product <i><b>$id</b></i> removed :) <br><br>";

echo '<i><a href="index.php"> << All list</a></i><br><br>';

echo '<i><a href="cart.php">>> My List</a></i>';