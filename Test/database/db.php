<?php

use \Project3\Model\ProductList;

function findProductList(string $id): ?ProductList {
    foreach (allProductList() as $item) {
        if ($item->id === $id) {
            return $item;
        }
    }
    return null;
}

function allProductList(): array {
    return [
        new ProductList('1', 'Polo Ralph', 'Unisex wear', '$450'),
        new ProductList('2', 'Bed Spread', 'Fit for all', '$100'),
        new ProductList('3', 'Iron', 'Steam iron', '80'),
        new ProductList('4', 'Laptop Bag', 'Luxury', '$70'),
    ];
}

