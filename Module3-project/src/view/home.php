<?php

return static function(): array {

    return $products = allProducts();

    echo '<h1> Product List</h1>';

    echo '<ul>';

    foreach ($products as $product) {
        echo "<li>$product->id [$product->name]<a href='add-product-list.php?id=$product->id'>Add</a> </li>";
    }

    echo '</ul>';

    echo '<i><a href="my-product.php">>> My Product</a></i>';


/*
    return <<<HTML

<html>
<h1>Product List</h1>

<table>
<tr>
<th>ProductId</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Quantity</th>
</tr>

<tr>
<td>001</td>
<td>Laptop</td>
<td>Hp Pavilion</td>
<td>50</td>
<td>4</td>
</tr>

<tr>
<td>002</td>
<td>TV</td>
<td>Hp Panasonic</td>
<td>55</td>
<td>2</td>
</tr>

<tr>
<td>003</td>
<td>Phone</td>
<td>Samsung</td>
<td>70</td>
<td>5</td>
</tr>

</table>
</html>

HTML;
**/
};

