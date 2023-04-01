<?php

use Project3\Controller\Product;

//require_once __DIR__ . '/../init.php';

$sessionProduct = $_SESSION['product'] ?? null;
$product = null === $sessionProduct
    ? new Product()
    : unserialize($sessionProduct);

echo '<h1>My Order List</h1>';

echo '<b><small>Qty: ' . count($product->list) . '</small></b>';

echo '<ul>';
foreach ($product->list as $item) {
    echo "<li>$list->id, $list->name, $list->description | <a href='remove-product.php?email=$list->id'>Remove</a></li>";
}
echo '</ul>';

echo '<i><a href="index.php"> << All list</a></i>';
