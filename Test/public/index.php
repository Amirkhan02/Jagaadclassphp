<?php

//require_once __DIR__ . '/../init.php';

//session_destroy();

$list = allProductList();

echo '<h1>Product List</h1>';

echo '<ul>';
foreach ($list as $item) {
    echo "<li>$list->id [$list->name] [$list->deescription] [$list->price]<a href='add-to-cart.php?id=$list->id'>Add</a></li>";
}
echo '</ul>';

echo '<i><a href="cart.php">>> My Order List</a></i>';