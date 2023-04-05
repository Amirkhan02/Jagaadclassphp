<?php
require_once __DIR__ . '/../init.php';

//session_destroy();

$products = allProducts();

echo '<h1> Product List</h1>';

echo '<ul>';

foreach ($products as $product) {
    echo "<li>$product->id [$product->name]<a href='add-product-list.php?id=$product->id'>Add</a> </li>";
}

echo '</ul>';

echo '<i><a href="my-product.php">>> My Product</a></i>';


