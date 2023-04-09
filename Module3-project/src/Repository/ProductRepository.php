<?php

namespace OnlineShopping\Repository;

use OnlineShopping\Model\Product;

interface ProductRepository
{
    /** @return Product[] */
    public function findAll(): array;
    public function store(Product $product): void;
    public function delete(string $id): void;
}